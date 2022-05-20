<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\NotificationRepositoryInterface;
use App\Http\Resources\UserResource as UserResource;

class UserController extends Controller
{
    /** @var NotificationRepository */
    private $notificationRepository;

    /** @var UserRepository */
    private $userRepository;

    /**
     * Create a new controller instance.
     *
     * @param  DeviceRepository 
     */
    public function __construct(UserRepositoryInterface $userRepo, NotificationRepositoryInterface $notificationRepo)
    {
        $this->userRepository = $userRepo;
        $this->notificationRepository = $notificationRepo;
    }

    public function index()
    {
        $users = User::get();

        return UserResource::collection($users);
    }

    public function get_list_nearby_users(Request $request)
    {
        $users = $this->userRepository->listNearbyUsers($request);

        return UserResource::collection($users);
    }


    public function show($id)
    {
        $user = User::find($id); //id comes from route
        if ($user) {
            return new UserResource($user);
        }
        return response()->json("User Not found", 400);
    }

    public function update_name(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;

        if ($user->save()) {
            return new UserResource($user);
        }
    }

    public function update_email(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->email = $request->email;

        if ($user->save()) {
            return new UserResource($user);
        }
    }

    public function update_phone(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->phone = $request->phone;

        if ($user->save()) {
            return new UserResource($user);
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->delete()) {
            return new UserResource($user);
        }
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
