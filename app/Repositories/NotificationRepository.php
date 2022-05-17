<?php

namespace App\Repositories;

use App\Repositories\Contracts\NotificationRepositoryInterface;
use Illuminate\Support\Facades\Http;
use Ladumor\OneSignal\OneSignal;

class NotificationRepository implements NotificationRepositoryInterface
{

    public function createNotification($data, $player_ids)
    {
        $fields['include_player_ids'] = ['xxxxxxxx'];
        $msg = 'This message will appear outside your apps UI.';
        OneSignal::sendPush($fields, $msg);
    }
}
