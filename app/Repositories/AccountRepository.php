<?php
namespace App\Repositories;

use App\Models\User;
use App\Models\Device;
use App\Repositories\Contracts\AccountRepositoryInterface;
use Illuminate\Http\Request;

class AccountRepository implements AccountRepositoryInterface
{   
    protected $device;
        
    public function __construct(User $user)
    {
            $this->user = $user;
    }

    public function createAccount(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        $user->sendEmailVerificationNotification();

        $user_token = $user->createToken($request->device_name);

        Device::create([
            'name' => $request->device_name,
            'access_token_id' => $user_token->token->id,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return $user;
    }

    public function authSession(Request $request)
    {
        $user = User::find(auth()->user()->id);
        
        $user_token = $user->createToken($request->device_name);

        Device::create([
            'name' => $request->device_name,
            'access_token_id' => $user_token->token->id,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        User::where('id', auth()->user()->id)->update([
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);
        
        return $this->respondWithToken($user_token->accessToken);
    }

    public function removeSession(Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();
        $token->delete();
    }

    public function respondWithToken($token)
    {
        return response()->json([
            'user' => auth()->user(),
            'access_token' => $token,
            'token_type' => 'bearer'
        ]);
    }
}