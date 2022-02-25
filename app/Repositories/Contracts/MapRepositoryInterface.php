<?php

namespace App\Repositories\Contracts;
use Illuminate\Http\Request;

interface MapRepositoryInterface
{
    public function getAddress($lat, $lng);
}