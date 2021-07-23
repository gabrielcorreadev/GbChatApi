<?php

namespace App\Http\Controllers\Api\V1\Account;

use App\Http\Controllers\Controller;
use App\Models\DeviceManager;
use App\Http\Resources\DeviceManagerCollection as DeviceManagerCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DeviceManagerController extends Controller
{
    public function all_devices(Request $request)
    {
        $user = $request->user()->token();
        $devices = DeviceManager::where('access_token_id', '!=', $user->id)->get();
        return DeviceManagerCollection::collection($devices);
    }

    public function logout_all_devices(Request $request)
    {
        $user = $request->user()->token();
        $userTokens = Auth::user()->tokens->where('id', '!=', $user->id);

        if ($userTokens) {
            foreach ($userTokens as $token) {
                $token->delete();
            }
            return response()->json(['message' => __('auth.logout_all')], 200);
        }
        return response()->json(['message' => __('auth.no_devices_found')], 400);
    }

    public function logout_device($id)
    {
        $userToken = Auth::user()->tokens->firstWhere('id', $id);

        if ($userToken) {
            $userToken->delete();
            return response()->json(['message' => __('auth.logout_device_custom')], 200);
        }

        return response()->json(['message' => __('auth.device_not_found')], 400);
    }
}
