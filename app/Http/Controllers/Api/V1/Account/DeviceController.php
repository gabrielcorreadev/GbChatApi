<?php

namespace App\Http\Controllers\Api\V1\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Device;
use App\Http\Resources\DeviceResource as DeviceResource;
use Illuminate\Support\Facades\Auth;

class DeviceController extends Controller
{
    public function all_devices(Request $request)
    {
        $user = $request->user()->token();
        $devices = Device::where('access_token_id', '!=', $user->id)->get();
        return DeviceResource::collection($devices);
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
