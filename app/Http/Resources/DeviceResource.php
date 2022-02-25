<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Repositories\Contracts\MapRepositoryInterface; 

class DeviceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'access_token_id' => $this->access_token_id,
            'lat' => $this->latitude,
            'lng' => $this->longitude,
            'created_at' => $this->created_at,
            'current_device' => $this->checkCurrentDevice($request, $this->access_token_id),
            'localization' => getCurrentLocalization($this->latitude, $this->longitude),
        ];
    }

    protected function checkCurrentDevice($request, $access_token_id)
    {
        if($request->user()->token()->id == $access_token_id)
        {
            return true;
        }
        return false;
    }
}
