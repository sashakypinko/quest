<?php

namespace App\Http\Resource\Collection;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\DB;

class MessageCollection extends ResourceCollection
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
                'owner_id' => DB::table('user_message')->where('message_id',$response->id)->first()->from_id,
                'message' => $response->message,
                'is_read' => $response->is_read,
                'created_at' => $response->created_at,

            ];
        })->toArray();
    }
}
