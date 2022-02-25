<?php

namespace App\Repositories;

use App\Models\Message;
use App\Repositories\Contracts\ChatRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatRepository implements ChatRepositoryInterface
{
    protected $messages;

    public function __construct(Message $messages)
    {
        $this->messages = $messages;
    }

    public function getLatestConversations(Request $request)
    {
    }

    public function sendMessage(Request $request)
    {
        
    }
}
