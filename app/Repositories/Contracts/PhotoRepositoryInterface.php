<?php

namespace App\Repositories\Contracts;
use Illuminate\Http\Request;

interface PhotoRepositoryInterface
{
    public function uploadProfile($request);

    public function removeProfile();

    public function uploadCover($request);

    public function removeCover();
}