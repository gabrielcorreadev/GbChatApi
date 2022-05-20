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

    public function __construct(NotificationRepositoryInterface $notificationRepo)
    {
        $this->notificationRepository = $notificationRepo;
    }

    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers;
        return UserResource::collection($followers);
    }

    public function follow_user($id)
    {
        $user = User::find($id);

        if (!$user) {
            return $this->sendError('User does not exist.', 400);
        }

        $user->followers()->attach(auth()->user()->id);

        $this->notificationRepository->newFollower($id);

        return $this->sendSuccess('Successfully followed the user.');
    }

    public function unfollow_user($id)
    {
        $user = User::find($id);
        if (!$user) {
            return $this->sendError('User does not exist.', 400);
        }

        $user->followers()->detach(auth()->user()->id);
        return $this->sendSuccess('Successfully unfollowed the user.');
    }
}
