<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Photo; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;


 function getUrlApiMaps()
 {
     return "https://discover.search.hereapi.com/v1";
 }

/**
 * @return int
 */
function getLoggedInUserId()
{
    return Auth::id();
}

/**
 * @return User
 */

function getLoggedInUser()
{
    return Auth::user();
}

function getDefaultAvatar() {
    return asset('assets/images/avatar.png');
}

function getDefaultPhotoUser($photo_path)
{
    return $photo_path ? url(Storage::url($photo_path)) : getDefaultAvatar();
}

function getCurrentLocalization($lat, $lng)
{
    $position = $lat .','. $lng;
    
    $response = Http::get(getUrlApiMaps(). '/discover?at='. $position .'&q='. $position .'&apiKey='.env('HERE_MAPS_API_KEY'));

    if($response->successful())
    {
        return $response->object()->items[0]->address->city.' - '.$response->object()->items[0]->address->stateCode;
    }
    
    return 'Localização desconhecida';
}