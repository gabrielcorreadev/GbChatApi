<?php

namespace App\Repositories\Contracts;
use Illuminate\Http\Request;

interface NotificationRepositoryInterface
{
    public function newFollower($id);

    public function sendNotification($params);

    public function createNotification($data);
}