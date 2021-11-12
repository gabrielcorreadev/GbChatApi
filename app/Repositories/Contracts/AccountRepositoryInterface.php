<?php

namespace App\Repositories\Contracts;
use Illuminate\Http\Request;

interface AccountRepositoryInterface
{
    public function createAccount(Request $request);

    public function authSession(Request $request);

    public function removeSession(Request $request);

    public function respondWithToken($token);
}