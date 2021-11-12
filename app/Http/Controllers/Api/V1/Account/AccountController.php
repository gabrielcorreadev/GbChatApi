<?php

namespace App\Http\Controllers\Api\V1\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Contracts\AccountRepositoryInterface; 

class AccountController extends Controller
{
        /** @var AccountRepository */
        private $accountRepository;

        /**
         * Create a new controller instance.
         *
         * @param  DeviceRepository 
         */
        public function __construct(AccountRepositoryInterface $accountRepo)
        {
            $this->accountRepository = $accountRepo;
        }

    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'device_name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 400);
        }

        $this->accountRepository->createAccount($request);

        return response()->json(['token' => $request->device_name], 200);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'email|required',
            'password' => 'required'
        ]);


        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 400);
        }

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response(['message' => __('auth.failed_login')], 400);
        }
        
        return $this->accountRepository->authSession($request);
    }

    public function logout(Request $request)
    {
        $this->accountRepository->removeSession($request);
        $response = ['message' => __('auth.logout')];
        return response($response, 200);
    }

    public function me()
    {
        return response()->json(['user' => auth()->user()], 200);
    }
}
