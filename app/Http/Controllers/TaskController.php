<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /* public function index(Task $task)
    {
        return Inertia::render('Profile/Dashboard', [
            'task' => $task
        ]);
    } */
    public function index()
    {
        $tasks = Task::latest('updated_at')->get();
        return Inertia::render('Dashboard', [
            'tasks' => $tasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Task::create([
            'title' => $request->input('title'),
            'is_done' => false,
        ]);

        return redirect()->to('/dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        Log::info('Updating task with ID: ' . $task->id); // Add this line
        Log::info($request->all()); // Log the request data
        DB::enableQueryLog();

        /* $task->update([
            // 'is_done' => $request->boolean('is_done'),
            // 'is_done' => $request->input('is_done') === 'true',
            'is_done' => !$task->is_done
        ]); */

        // $task->title = $task->title;
        // $task->is_done = !$task->is_done;
        // $task->save();

        $task->is_done = $request->input('is_done');
        $task->save();
        Log::info(DB::getQueryLog());

        return redirect()->to('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
