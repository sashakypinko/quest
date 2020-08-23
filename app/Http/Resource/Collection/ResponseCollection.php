<?php


namespace App\Http\Resource\Collection;


use Illuminate\Http\Resources\Json\ResourceCollection;

class ResponseCollection extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return $this->collection->transform(function ($response){
            return [
                'image' => $response->image,
                'description' => $response->description,
                'created_at' => $response->created_at,
                'task' => [
                    'title' => $response->task->title,
                    'description' => $response->task->description
                ]
            ];
        })->toArray();
    }
}
