<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

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
            'lat' => $this->lat,
            'lng' => $this->lng,
            'created_at' => $this->created_at,
            'current_device' => $this->checkCurrentDevice($request, $this->access_token_id),
            'localization' => $this->getCurrentLocalization($this->lat, $this->lng),
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

    protected function getCurrentLocalization($lat, $lng)
    {
        $response = Http::get('https://revgeocode.search.hereapi.com/v1/revgeocode?at='. $lat .','. $lng .'&q=&apiKey='.env('HERE_MAPS_API_KEY'));

        if($response->successful())
        {
            return $response->object()->items[0]->address->city.' - '.$response->object()->items[0]->address->stateCode;
        }
        return 'Localização desconhecida';
    }
}
