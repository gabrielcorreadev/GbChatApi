<?php
namespace App\Repositories;

use App\Models\Device;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Contracts\DeviceRepositoryInterface;
use Illuminate\Http\Request;

class DeviceRepository implements DeviceRepositoryInterface
{   
    protected $device;
        
    public function __construct(Device $device)
    {
            $this->device = $device;
    }

    public function getlistDevices(Request $request)
    {
        $user = $request->user()->token();
        $userTokens = Auth::user()->tokens->pluck('id')->toArray();

        $devices = $this->device->whereIn('access_token_id', $userTokens)->get();
        return $devices;
    }

    public function removeListDevices(Request $request)
    {
        $user = $request->user()->token();
        $userTokens = Auth::user()->tokens->where('id', '!=', $user->id);
        if(count($userTokens) > 0)
        {
            $this->removeTokens($userTokens);
            return true;
        }
        return false;
    }

    public function removeDeviceById($id)
    {
        $userToken = Auth::user()->tokens->firstWhere('id', $id);

        if($userToken)
        {
            $this->removeToken($userToken);
            return true;
        }
        return false;
    }

    public function removeToken($token)
    {
        $token->delete();
    }

    public function removeTokens($tokens)
    {
        foreach ($tokens as $token) {
            $token->delete();
        }
    }
}