<?php

namespace App\Repositories\Contracts;
use Illuminate\Http\Request;

interface NotificationRepositoryInterface
{
    public function createNotification($data, $player_ids);
}