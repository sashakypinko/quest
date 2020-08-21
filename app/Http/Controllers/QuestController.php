<?php

namespace App\Http\Controllers;

use App\Models\Task;

class QuestController extends Controller
{
    public $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function index()
    {
        return view('quest', [
            'task' => $this->task->getTask()
        ]);
    }
}
