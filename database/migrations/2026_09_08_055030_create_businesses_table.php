<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('category')->nullable();
            $table->string('location')->nullable();
            $table->string('business_type')->nullable();
            $table->string('time')->nullable();

            $table->unsignedBigInteger('investment_min')->nullable();
            $table->unsignedBigInteger('investment_max')->nullable();

$table->string('profit')->nullable();
$table->text('description')->nullable();

$table->text('how_to_start')->nullable();
$table->text('required_things')->nullable();
$table->json('planning_steps')->nullable();

$table->string('image')->nullable();

            $table->boolean('status')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};