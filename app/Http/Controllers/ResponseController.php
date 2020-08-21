<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResponseRequest as Request;
use App\Models\Response;
use App\User;

class ResponseController extends Controller
{

    public $model;

    /**
     * ResponseController constructor.
     * @param Response $model
     */
    public function __construct(Response $model) {
        $this->model = $model;
    }
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        return view('response.index');
    }

    public function send(Request $request, User $user) {
        $image = $this->model->saveFile($request->image);
        $this->model->send($image, $request->description);
        $user->setNextTask();

        return response()->json([
            'message' => 'Ответ успешно отправлен. Приступайте к следующему заданию!'
        ]);
    }
}
