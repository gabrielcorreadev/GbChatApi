<?php

namespace App\Repositories;

use App\Repositories\Contracts\NotificationRepositoryInterface;
use OneSignal;
use App\Models\User;
use App\Models\Device;

class NotificationRepository implements NotificationRepositoryInterface
{

    private $device;

    public function __construct(Device $device)
    {
        $this->device = $device;
    }

    public function newFollower($id)
    {
        $user = User::find($id);
        $user_auth = User::find(auth()->user()->id);
        $player_ids = $this->device->where('user_id', $id)->pluck('player_id')->toArray();

        if (count($player_ids) > 0) {
            
        $params = []; 
        $params['include_player_ids'] = $player_ids; 
        $headings = [ 
            "en" => 'GbChat',
         ];
        $contents = [ 
           "en" => $user_auth->name. ' começou a seguir você.',
        ]; 
        $params['headings'] = $headings; 
        $params['contents'] = $contents; 
        $params['large_icon'] = $user_auth->photo; 
        $params['android_accent_color'] = "9f2349";
        
        $this->sendNotification($params);
    }
    }

    public function sendNotification($params)
    { 
        OneSignal::sendNotificationCustom($params);
    }

    public function createNotification($data)
    {
        
    }
}
