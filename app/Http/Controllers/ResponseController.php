<?php

namespace App\Http\Controllers;

use App\Events\ResponseEvent;
use App\Http\Requests\ResponseRequest;
use App\Http\Resource\Collection\ResponseCollection;
use App\Models\Response;
use App\User;
use Illuminate\Http\Request;

class ResponseController extends Controller
{

    public $model;

    /**
     * ResponseController constructor.
     * @param Response $model
     */
    public function __construct(Response $model)
    {
        $this->model = $model;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        return view('response.index', [
            'users' => User::where('verified', 0)->get()
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('response.create');
    }

    /**
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function send(ResponseRequest $request, User $user)
    {
        $image = $this->model->saveFile($request->image);
        $id = $this->model->send($image, $request->description);
        $user->setNextTask();
        event(new ResponseEvent($id));

        return response()->json([
            'message' => 'Ответ успешно отправлен. Приступайте к следующему заданию!'
        ]);
    }

    public function get(Request $request)
    {
        $response = $this->model->getResponses($request->id);

        return response()->json([
            'responses' => new ResponseCollection($response)
        ]);
    }

}
