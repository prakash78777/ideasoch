<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Throwable;

class TransferSqliteData extends Command
{
    protected $signature = 'app:transfer-sqlite-data';

    protected $description = 'Transfer SQLite backup data to MySQL safely';

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
            if (! Schema::connection('old_sqlite')->hasTable($table)
                || ! Schema::connection('mysql')->hasTable($table)) {
                $this->error("Missing source or destination table: {$table}");
                return self::FAILURE;
            }
        }

        // Verify all tables before copying anything.
        foreach ($tables as $table) {
            $sourceCount = DB::connection('old_sqlite')
                ->table($table)->count();

            $targetCount = DB::connection('mysql')
                ->table($table)->count();

            $this->line(
                "{$table}: SQLite={$sourceCount}, MySQL={$targetCount}"
            );
        }

        if (! $this->confirm(
            'Review the counts above. Continue with safe copy?',
            false
        )) {
            $this->info('Cancelled. No data was copied.');
            return self::SUCCESS;
        }

        try {
            DB::connection('mysql')->transaction(function () use ($tables) {
                foreach ($tables as $table) {
                    $source = DB::connection('old_sqlite')->table($table);
                    $target = DB::connection('mysql')->table($table);
                    $mysqlColumns = Schema::connection('mysql')
                        ->getColumnListing($table);

                    $existingIds = $target->pluck('id')->all();
                    $existingNames = [];

                    if ($table === 'categories') {
                        $existingNames = $target->pluck('name')->all();
                    }

                    $copied = 0;
                    $skipped = 0;

                    foreach ($source->orderBy('id')->cursor() as $row) {
                        $data = array_intersect_key(
                            (array) $row,
                            array_flip($mysqlColumns)
                        );

                        if (isset($data['id'])
                            && in_array($data['id'], $existingIds, true)) {
                            $skipped++;
                            continue;
                        }

                        if ($table === 'categories'
                            && isset($data['name'])
                            && in_array($data['name'], $existingNames, true)) {
                            $skipped++;
                            continue;
                        }

                        $target->insert($data);
                        $copied++;
                    }

                    $this->info(
                        "{$table}: copied {$copied}, skipped {$skipped}"
                    );
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
