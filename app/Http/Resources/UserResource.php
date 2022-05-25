<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserResource extends JsonResource
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
            'email' => $this->email,
            'phone' => $this->phone,
            'photo' => $this->photo,
            'cover' => $this->cover_url,
            "is_following" => $this->checkIsFollowing($this->id),
            'localization' => getCurrentLocalization($this->latitude, $this->longitude),
            'distance' => $this->distance,
            'lat' => $this->latitude,
            'lng' => $this->longitude,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

    protected function checkIsFollowing($id)
    {
        $user = User::find($id);
        $me = User::find(Auth::user()->id);
        return $me->isFollowing($user);
    }
}
