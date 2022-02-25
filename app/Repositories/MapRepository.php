<?php

namespace App\Repositories;

use App\Repositories\Contracts\MapRepositoryInterface;
use Illuminate\Support\Facades\Http;

class MapRepository implements MapRepositoryInterface
{
    protected $URL_API;

    public function __construct()
    {
        $this->URL_API = "https://discover.search.hereapi.com/v1";
    }

    public function getAddress($lat, $lng)
    {
        $position = $lat .','. $lng;
        
        $response = Http::get($this->URL_API. '/discover?at='. $position .'&q='. $position .'&apiKey='.env('HERE_MAPS_API_KEY'));

        if($response->successful())
        {
            return $response->object()->items[0]->address->city.' - '.$response->object()->items[0]->address->stateCode;
        }
        
        return 'Localização desconhecida';
    }
}
