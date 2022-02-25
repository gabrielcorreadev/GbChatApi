<?php

namespace App\Http\Controllers\Api\V1\Account;
use App\Http\Controllers\Api\AppBaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Contracts\AccountRepositoryInterface; 

class AccountController extends AppBaseController
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
            return $this->sendError($validator->errors()->first(), 400);
        }
        
        $data = $this->accountRepository->createAccount($request);
        return $this->sendResponse($data, __('auth.login_successfully'));
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'email|required',
            'password' => 'required'
        ]);


        if ($validator->fails()) {
            return $this->sendError($validator->errors()->first(), 400);
        }

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return $this->sendError(__('auth.failed_login'), 400);
        }
        
        $data = $this->accountRepository->authSession($request);
        return $this->sendResponse($data, __('auth.login_successfully'));
    }

    public function logout(Request $request)
    {
        $this->accountRepository->removeSession($request);
        return $this->sendSuccess(__('auth.logout'));
    }

    public function me()
    {
        return $this->sendData(auth()->user());
    }
}
