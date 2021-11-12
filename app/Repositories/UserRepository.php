<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserRepositoryInterface
{
    protected $device;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function listUsers(Request $request)
    {
    }

    public function listNearbyUsers(Request $request)
    {
        $latitude = $request->query('lat');
        $longitude = $request->query('lng');
        $range = $request->query('range');

        $users = User::select("*", DB::raw("6371 * acos(cos(radians(" . $latitude . "))
                                * cos(radians(latitude)) * cos(radians(longitude) - radians(" . $longitude . "))
                                + sin(radians(" . $latitude . ")) * sin(radians(latitude))) AS distance"));
        $users = $users->having('distance', '<', $range);
        $users = $users->orderBy('distance', 'asc');

        $user = $request->user()->token();

        $usersData = $users->where('id', '!=', $user->user_id)->get();
        return $usersData;
    }
}
