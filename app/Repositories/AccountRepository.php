<?php
namespace App\Repositories;

use App\Models\User;
use App\Models\Device;
use App\Repositories\Contracts\AccountRepositoryInterface;
use Illuminate\Http\Request;
use Notification;
use App\Notifications\NewLogin;
use App\Repositories\Contracts\MapRepositoryInterface; 

class AccountRepository implements AccountRepositoryInterface
{   
    protected $device;
    protected $mapRepository;

    public function __construct(User $user, MapRepositoryInterface $mapRepo)
    {
            $this->mapRepository = $mapRepo;
    }

    public function createAccount(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'photo_url' => $request->photo_url ? $request->photo_url : null,
        ]);

        $user->sendEmailVerificationNotification();

        $user_token = $user->createToken($request->device_name);

        Device::create([
            'name' => $request->device_name,
            'access_token_id' => $user_token->token->id,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return $this->respondWithToken($user_token->accessToken);
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

        $details = [
            'name' => $user->name,
            'email' => $user->email,
            'localization' => $this->mapRepository->getAddress($request->latitude, $request->longitude),
            'device_name' => $request->device_name,
        ];
        
        $user->notify(new NewLogin($details));
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
        return [
            'user' => auth()->user(),
            'access_token' => $token,
            'token_type' => 'bearer'
        ];
    }
}