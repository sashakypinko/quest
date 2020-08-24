<?php

namespace App\Services;

use App\Models\Chat;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MessageService
{

    /**
     * @param $message
     * @param $chat
     * @return mixed
     */
    public function sendMessage($message, $chat)
    {
        return Message::create([
            'chat_id' => $chat->id,
            'from_id' => Auth::user()->id,
            'message' => $message,
        ]);

    }

    /**
     * @param $userId
     * @return mixed
     */
    public function getMessages($userId)
    {
        $chat = $this->getChat($userId);
        $messages = Message::where('chat_id', $chat->id)->get();

        return sizeof($messages) > 0 ? $messages : $chat;
    }

    /**
     * @param $userId
     * @return mixed
     */
    public function getChat($userId)
    {
        $ownId = Auth::user()->id;
        $chat = Chat::chat($userId, $ownId)->first();

        if ($chat) {
            return $chat;
        }

        return Chat::create([
            'owner_id' => $ownId,
            'invited_id' => $userId,
        ]);
    }

    /**
     * @param $userId
     */
    public function setReaded($userId)
    {
        $chat = $this->getChat($userId);

        Message::where('chat_id', $chat->id)->where('from_id', $userId)->update([
            'is_read' => 1
        ]);
    }
}
