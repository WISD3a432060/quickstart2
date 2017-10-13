<?php

namespace App\Http\Controllers;

use App\Task;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;


class TaskController extends Controller
{
    protected $tasks;
    
   /**
 * 建立新的任務。
 *
 * @param  Request  $request
 * @return Response
 */
public function store(Request $request)
{
    $this->validate($request, [
        'name' => 'required|max:255',
    ]);

    // Create The Task...
}
    /**
     * 建立新的控制器實例。
     *
     * @param  TaskRepository  $tasks
     * @return void
     */
public function __construct(TaskRepository $tasks)
{
    $this->middleware('auth');

    $this->tasks = $tasks;
}
    /**
     * 取得給定使用者的所有任務。
     *
     * @param  Request  $request
     * @return Response
     */
     public function index(Request $request)
     {
         return view('tasks.index', [
             'tasks' => $this->tasks->forUser($request->user()),
         ]);
     } 

/**
 * Display a list of all of the user's task.
 *
 * @param  Request  $request
 * @return Response
 */
 public function index(Request $request)
 {
     $tasks = Task::where('user_id', $request->user()->id)->get();
 
     return view('tasks.index', [
         'tasks' => $tasks,
     ]);
 }
 
}
