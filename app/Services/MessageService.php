<?php

namespace App\Services;

use App\Models\Activity;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessageService
{
    public $table = 'user_message';

    /**
     * @param $message
     * @param $user_id
     */
    public function sendMessage($message, $user_id)
    {
        $messageId = Message::create([
            'message' => $message
        ])->id;

        DB::table($this->table)->insert([
            'message_id' => $messageId,
            'from_id' => Auth::user()->id,
            'to_id' => $user_id,
            'created_at' => now()
        ]);
    }

    public function getMessages($user_id)
    {
        return $this->getMessagesQuery($user_id)->get();
    }

    public function getMessagesQuery($user_id)
    {
        $query = Message::join('user_message', 'user_message.message_id', '=', 'messages.id');

        return $query->message($user_id);
    }
}
