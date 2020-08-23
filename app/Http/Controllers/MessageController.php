<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\User;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        return view('message.index', [
            'user' => User::where('id', '<>', Auth::user()->id)->first()
        ]);
    }

    public function list()
    {
        return view('message.list');
    }

    public function send(MessageRequest $request) {

    }
}
