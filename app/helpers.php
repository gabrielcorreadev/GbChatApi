<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Photo; 
use Illuminate\Support\Facades\Storage;

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