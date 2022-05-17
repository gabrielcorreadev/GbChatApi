<?php

namespace App\Http\Controllers\Api\V1\Follower;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\AppBaseController;
use App\Http\Resources\UserResource as UserResource;
use App\Repositories\Contracts\NotificationRepositoryInterface;
use App\Models\User;
use App\Models\Device;

class FollowerController extends AppBaseController
{
    /** @var NotificationRepository */
    private $notificationRepository;
    private $device;

    /**
     * Create a new controller instance.
     *
     * @param  DeviceRepository 
     */
    public function __construct(NotificationRepositoryInterface $notificationRepo, Device $device)
    {
        $this->notificationRepository = $notificationRepo;
        $this->device = $device;
    }

    public function show($id)
    {
        $user = User::find($id);
        $followers = $user->followers;
        return UserResource::collection($followers);
    }

    public function followUser($id)
    {
        $user = User::find($id);
        $user_auth = User::find(auth()->user()->id);

        if (!$user) {
            return $this->sendError('User does not exist.', 400);
        }

        $player_ids = $this->device->where('user_id', $id)->pluck('player_id')->toArray();

        if (count($player_ids) > 0) {

            $data = [
                'title' => 'GbChat',
                'content' => $user_auth->name. ' começou a seguir você.',
                'icon' => $user_auth->photo,
            ];

            $user->followers()->attach(auth()->user()->id);

            $this->notificationRepository->createNotification($data, $player_ids);
        }

        return $this->sendSuccess('Successfully followed the user.');
    }

    public function unFollowUser($id)
    {
        $user = User::find($id);
        if (!$user) {
            return $this->sendError('User does not exist.', 400);
        }

        $user->followers()->detach(auth()->user()->id);
        return $this->sendSuccess('Successfully unfollowed the user.');
    }
}
