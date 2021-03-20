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
        'description' => ''
      ]);
      Task::create([
        'user_id' => auth()->id(),
        'title' => $attributes['title'],
        'priority' => $attributes['priority'],
        'description' => $attributes['description'],
        'state' => false
      ]);

      return redirect()->back();
    }

    public function destroy(Task $task){
      $task->delete();
      return redirect()->back();
    }

    public function edit(Task $task){
      return view('tasks.edit', compact('task'));
    }

    public function update(Task $task){
      $attributes = request()->validate([
        'title' => 'required|max:255',
        'priority' => 'required',
        'description' => ''
      ]);
      $task->update([
        'title' => $attributes['title'],
        'priority' => $attributes['priority'],
        'description' => $attributes['description']
      ]);
      return redirect()->route('home');
    }

    public function done(Task $task){
      $task->update(['state' => $task->toggleCheck()]);
      return redirect()->back();
    }

    public function clear(){
      Task::where('state', true)->where('user_id', auth()->id())->delete();
      return redirect()->back();
    }
}
