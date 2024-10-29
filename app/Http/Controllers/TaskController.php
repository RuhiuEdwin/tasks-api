<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laravel\Lumen\Routing\Controller as Controller;

class TaskController extends Controller
{
    /**
     * Create a new task.
     * Validates incoming data and saves the new task to the database.
     */
    public function store(Request $request)
    {
        // Validation rules for creating a task
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:tasks|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date|after:today',
        ]);

        // Return validation errors
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Create the task and store it in the database
        $task = Task::create($request->all());

        return response()->json($task, 201);
    }

    /**
     * Retrieve all tasks.
     * Supports optional filtering by status, due_date, pagination, and title search.
     */
    public function index(Request $request)
    {
        $query = Task::query();

        // Filtering by status
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        // Filtering by due date
        if ($request->has('due_date')) {
            $query->whereDate('due_date', $request->due_date);
        }

        // Searching by title
        if ($request->has('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        // Pagination
        $tasks = $query->paginate(10);

        return response()->json($tasks);
    }

    /**
     * Retrieve a specific task by ID.
     */
    public function show($id)
    {
        // Find task by ID or return a 404 error
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
        }

        return response()->json($task);
    }

    /**
     * Update an existing task.
     * Validates input and updates task attributes.
     */
    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        // Check if task exists
        if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
        }

        // Validation rules for updating a task
        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|unique:tasks,title,' . $id . '|max:255',
            'description' => 'nullable|string',
            'status' => 'in:pending,completed',
            'due_date' => 'sometimes|date|after:today',
        ]);

        // Return validation errors
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Update task and save changes
        $task->update($request->all());

        return response()->json($task);
    }

    /**
     * Delete a task by ID.
     */
    public function destroy($id)
    {
        $task = Task::find($id);

        // Check if task exists
        if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
        }

        // Delete task from the database
        $task->delete();

        return response()->json(['message' => 'Task deleted successfully']);
    }
}
