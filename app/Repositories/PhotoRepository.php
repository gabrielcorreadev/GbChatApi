<?php

namespace App\Repositories;

use App\Repositories\Contracts\PhotoRepositoryInterface;
use OneSignal;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PhotoRepository implements PhotoRepositoryInterface
{

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function uploadProfile($request)
    {
        if ($file = $request->file('file')) {
            $path = $file->store('public');
               
            $user = User::where('id', Auth::user()->id)->first();

            if ($user->photo_url) {
                Storage::delete($user->photo_url);
            }

            User::where('id', Auth::user()->id)->update([
                'photo_url' => $path,
            ]);

            return $path;
        }
    }

    public function removeProfile()
    {
        $user = User::where('id', Auth::user()->id)->first();
        if ($user->photo_url) {
            Storage::delete($user->photo_url);
            User::where('id', Auth::user()->id)->update([
                'photo_url' => null,
            ]);

        }
    }

    public function uploadCover($request)
    {
        if ($file = $request->file('file')) {
            $path = $file->store('public');
               
            $user = User::where('id', Auth::user()->id)->first();

            if ($user->photo_url) {
                Storage::delete($user->cover_url);
            }

            User::where('id', Auth::user()->id)->update([
                'cover_url' => $path,
            ]);

            return $path;
        }
    }

    public function removeCover()
    {
        $user = User::where('id', Auth::user()->id)->first();
        if ($user->cover_url) {
            Storage::delete($user->cover_url);
            User::where('id', Auth::user()->id)->update([
                'cover_url' => null,
            ]);

        }
    }
}
