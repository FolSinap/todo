<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TasksUpdateController extends Controller
{
  public function update(Task $task){
    if ( $task->fail_at < date('Y-m-d') ) {
      abort(403);
    }
    if ($task->state) {
      $task->update([
        'state' => false,
        'checked_at' => NULL
      ]);
    }else {
      $task->update([
        'state' => true,
        'checked_at' => date('Y-m-d')
      ]);
    }
    
    return redirect()->back();
  }

  public function destroy(){
    Task::where('state', true)->where('user_id', auth()->id())->delete();
    return redirect()->back();
  }
}
