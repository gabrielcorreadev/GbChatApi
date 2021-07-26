<?php

namespace App\Http\Controllers\Api\V1\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Device;

class AccountController extends Controller
{
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'device_name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 400);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $user_token = $user->createToken($request->device_name);

        Device::create([
            'name' => $request->device_name,
            'access_token_id' => $user_token->token->id,
            'lat' => $request->lat,
            'lng' => $request->lng,
        ]);

        return response()->json(['token' => $request->device_name], 200);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'email|required',
            'password' => 'required'
        ]);


        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 400);
        }

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response(['message' => __('auth.failed_login')], 400);
        }

        $user = User::find(auth()->user()->id);
        
        $user_token = $user->createToken($request->device_name);

        Device::create([
            'name' => $request->device_name,
            'access_token_id' => $user_token->token->id,
            'lat' => $request->lat,
            'lng' => $request->lng,
        ]);

        return $this->respondWithToken($user_token->accessToken);
    }

    public function logout(Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();
        $token->delete();
        $response = ['message' => __('auth.logout')];
        return response($response, 200);
    }

    public function me()
    {
        return response()->json(['user' => auth()->user()], 200);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'user' => auth()->user(),
            'access_token' => $token,
            'token_type' => 'bearer'
        ]);
    }
}
