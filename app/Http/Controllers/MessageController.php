<?php

namespace App\Http\Controllers;

use App\Events\SendMessage;
use App\Http\Requests\MessageRequest;
use App\Http\Resource\Collection\MessageCollection;
use App\Services\MessageService;
use App\Models\Message as Model;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

    public $model;
    public $service;

    /**
     * MessageController constructor.
     * @param Model $model
     * @param MessageService $service
     */
    public function __construct(Model $model, MessageService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('message.index', [
            'user' => User::where('id', '<>', Auth::user()->id)->first(),
            'users' => User::where('id', '<>', Auth::user()->id)->get(),
        ]);
    }

    /**
     * @param MessageRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function send(MessageRequest $request)
    {
        $chat = $this->service->getChat($request->user_id);
        $message = $this->service->sendMessage($request->message, $chat);
        $this->service->setReaded($request->user_id);
        event(new SendMessage($message, $chat->id));

        return response()->json([
            'message' => $message
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMessages(Request $request)
    {
        $this->service->setReaded($request->id);

        return response()->json([
            'messages' => $this->service->getMessages($request->id)
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUser(Request $request)
    {
        return response()->json([
           'user' => User::find($request->id)
        ]);
    }
}
