<?php

namespace App\Http\Controllers;

use App\Models\Task;

class TaskController extends Controller
{
    public $task;

    /**
     * TaskController constructor.
     * @param Task $task
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $task = $this->task->getTask();

        if (!$task) {
            return view('final');
        }

        return view('task.index', [
            'task' => $task,
            'count' => $this->task->getTasksCount()
        ]);
    }
}
