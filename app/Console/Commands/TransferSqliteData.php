<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Throwable;

class TransferSqliteData extends Command
{
    protected $signature = 'app:transfer-sqlite-data';

    protected $description = 'Safely transfer SQLite backup data to MySQL';

    public function handle(): int
    {
        $backup = database_path('database-backup.sqlite');

        if (! file_exists($backup)) {
            $this->error("Backup not found: {$backup}");
            return self::FAILURE;
        }

        config([
            'database.connections.old_sqlite' => [
                'driver' => 'sqlite',
                'database' => $backup,
                'prefix' => '',
                'foreign_key_constraints' => true,
            ],
        ]);

        DB::purge('old_sqlite');

        $tables = [
            'users',
            'categories',
            'businesses',
            'ai_questions',
            'saved_ideas',
            'contact_leads',
        ];

        foreach ($tables as $table) {
            if (!Schema::connection('old_sqlite')->hasTable($table)
                || !Schema::connection('mysql')->hasTable($table)) {
                $this->error("Missing table: {$table}");
                return self::FAILURE;
            }
        }

        // Keep existing categories only if their IDs and names match.
        $sourceCategories = DB::connection('old_sqlite')
            ->table('categories')->orderBy('id')->get(['id', 'name'])->toArray();

        $targetCategories = DB::connection('mysql')
            ->table('categories')->orderBy('id')->get(['id', 'name'])->toArray();

        if ($sourceCategories != $targetCategories) {
            $this->error('Category IDs/names differ. Stopping safely.');
            return self::FAILURE;
        }

        foreach (['users', 'businesses', 'ai_questions', 'saved_ideas', 'contact_leads'] as $table) {
            $count = DB::connection('mysql')->table($table)->count();

            if ($count > 0) {
                $this->error("MySQL {$table} already contains {$count} rows. No data copied.");
                return self::FAILURE;
            }
        }

        // Validate saved idea references in the source backup.
        $old = DB::connection('old_sqlite');

        $badUsers = $old->table('saved_ideas')
            ->whereNotIn('user_id', $old->table('users')->select('id'))->count();

        $badBusinesses = $old->table('saved_ideas')
            ->whereNotIn('business_id', $old->table('businesses')->select('id'))->count();

        if ($badUsers || $badBusinesses) {
            $this->error('Saved Ideas contain invalid references. Stopping.');
            return self::FAILURE;
        }

        if (!$this->confirm('Checks passed. Copy source records to MySQL now?', false)) {
            $this->info('Cancelled. No data was copied.');
            return self::SUCCESS;
        }

        try {
            DB::connection('mysql')->transaction(function () use ($tables) {
                foreach ($tables as $table) {
                    if ($table === 'categories') {
                        $this->info('categories: already match; skipped.');
                        continue;
                    }

                    $columns = Schema::connection('mysql')->getColumnListing($table);
                    $copied = 0;

                    foreach (DB::connection('old_sqlite')->table($table)->orderBy('id')->cursor() as $row) {
                        $data = array_intersect_key((array) $row, array_flip($columns));

                        DB::connection('mysql')->table($table)->insert($data);
                        $copied++;
                    }

                    $this->info("{$table}: copied {$copied}");
                }
            });
        } catch (Throwable $e) {
            report($e);
            $this->error('Transfer failed; transaction rolled back.');
            $this->line($e->getMessage());
            return self::FAILURE;
        }

        $this->info('Transfer finished. Final counts:');

        foreach ($tables as $table) {
            $this->line(
                "{$table}: SQLite="
                . DB::connection('old_sqlite')->table($table)->count()
                . ', MySQL='
                . DB::connection('mysql')->table($table)->count()
            );
        }

        return self::SUCCESS;
    }
}
