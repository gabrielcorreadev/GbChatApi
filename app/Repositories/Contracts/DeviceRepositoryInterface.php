<?php

namespace App\Repositories\Contracts;
use Illuminate\Http\Request;

interface DeviceRepositoryInterface
{
    public function getlistDevices(Request $request);

    public function removeListDevices(Request $request);

    public function removeDeviceById($id);

    public function removeToken($token);

    public function removeTokens($tokens);
}