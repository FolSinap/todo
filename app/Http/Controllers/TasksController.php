<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TasksController extends Controller
{
    public function index(){
      $tasks = auth()->user()->tasks->sortBy('priority')->sortBy('state');
      return view('tasks.index', compact('tasks'));
    }

    public function store(){
      $attributes = request()->validate([
        'title' => 'required|max:255',
        'priority' => 'required',
        'description' => '',
        'deadline' => 'required|date|after_or_equal:today'
      ]);
      Task::create([
        'user_id' => auth()->id(),
        'title' => $attributes['title'],
        'priority' => $attributes['priority'],
        'description' => $attributes['description'],
        'state' => false,
        'fail_at' => $attributes['deadline']
      ]);

      return redirect()->back();
    }

    public function destroy(Task $task){
      $task->delete();
      return redirect()->back();
    }

    public function edit(Task $task){
      if ( $task->state || ($task->fail_at < date('Y-m-d')) ) {
        abort(403);
      }
      return view('tasks.edit', compact('task'));
    }

    public function update(Task $task){
      if ( $task->state || ($task->fail_at < date('Y-m-d')) ) {
        abort(403);
      }
      $attributes = request()->validate([
        'title' => 'required|max:255',
        'priority' => 'required',
        'description' => '',
        'deadline' => 'required|date|after_or_equal:today'
      ]);
      $task->update([
        'title' => $attributes['title'],
        'priority' => $attributes['priority'],
        'description' => $attributes['description'],
        'fail_at' => $attributes['deadline']
      ]);
      return redirect()->route('home');
    }

}
