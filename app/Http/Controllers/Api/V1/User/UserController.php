<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Http\Resources\UserResource as UserResource;

class UserController extends Controller
{
    /** @var UserRepository */
    private $userRepository;

    /**
     * Create a new controller instance.
     *
     * @param  DeviceRepository 
     */
    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepository = $userRepo;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id); //id comes from route
        if ($user) {
            return new UserResource($user);
        }
        return response()->json("User Not found", 400);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
