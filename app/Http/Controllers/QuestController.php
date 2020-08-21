<?php

namespace App\Http\Controllers;

use App\Models\Quest;
use App\Models\Task;

class QuestController extends Controller
{

    public function index()
    {
        return view('quest.index', [
            'quest' => Quest::find(1)
        ]);
    }
}
