<?php

namespace App\Repositories\Contracts;
use Illuminate\Http\Request;

interface UserRepositoryInterface
{
    public function listUsers(Request $request);

    public function listNearbyUsers(Request $request);
}