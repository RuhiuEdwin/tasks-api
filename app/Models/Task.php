<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // Define the table associated with the Task model
    protected $table = 'tasks';

    // Fields that are mass-assignable
    protected $fillable = ['title', 'description', 'status', 'due_date'];

    // Default values for the model attributes
    protected $attributes = [
        'status' => 'pending',
    ];

    // Cast attributes to the desired data type
    protected $casts = [
        'due_date' => 'date',
    ];
}
