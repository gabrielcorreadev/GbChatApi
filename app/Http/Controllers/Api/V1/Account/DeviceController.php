<?php

namespace App\Http\Controllers\Api\V1\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Device;
use App\Http\Resources\DeviceResource as DeviceResource;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Contracts\DeviceRepositoryInterface;

class DeviceController extends Controller
{
    /** @var DeviceRepository */
    private $deviceRepository;

    /**
     * Create a new controller instance.
     *
     * @param  DeviceRepository  $conversationRepo
     */
    public function __construct(DeviceRepositoryInterface $deviceRepo)
    {
        $this->deviceRepository = $deviceRepo;
    }


    public function all_devices(Request $request)
    {
        $devices = $this->deviceRepository->getlistDevices($request);
        return DeviceResource::collection($devices);
    }

    public function logout_all_devices(Request $request)
    {
        $isRemoved = $this->deviceRepository->removeListDevices($request);

        if ($isRemoved) {
            return response()->json(['message' => __('auth.logout_all')], 200);
        }
        return response()->json(['message' => __('auth.no_devices_found')], 400);
    }

    public function logout_device($id)
    {
        $isRemoved = $this->deviceRepository->removeDeviceById($id);

        if ($isRemoved) {
            return response()->json(['message' => __('auth.logout_device_custom')], 200);
        }
        return response()->json(['message' => __('auth.device_not_found')], 400);
    }
}
