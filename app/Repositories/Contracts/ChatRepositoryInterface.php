<?php

namespace App\Repositories\Contracts;
use Illuminate\Http\Request;

interface ChatRepositoryInterface
{
    public function getLatestConversations(Request $request);

    public function sendMessage(Request $request);
}