<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     * Define the schema for the tasks table.
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('title')->unique(); // Task title, must be unique
            $table->text('description')->nullable(); // Task description, optional
            $table->enum('status', ['pending', 'completed'])->default('pending'); // Status with default as 'pending'
            $table->date('due_date'); // Due date, must be a future date
            $table->timestamps(); // created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
