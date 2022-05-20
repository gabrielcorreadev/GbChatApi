<?php

namespace App\Http\Controllers\Api\V1\Account;
use App\Http\Controllers\Api\AppBaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Contracts\AccountRepositoryInterface; 
use Illuminate\Support\Facades\DB;
use App\Http\Resources\UserResource as UserResource;
use App\Models\User;

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
        return $this->sendResponse($data, __('auth.signup_successfully'));
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

        $user = DB::table('users')->where('email', $request->email)->first();
        
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

    public function update_name(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        $user->name = $request->name;

        if ($user->save()) {
            return new UserResource($user);
        }
    }

    public function update_email(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        $user->email = $request->email;

        if ($user->save()) {
            return new UserResource($user);
        }
    }

    public function update_phone(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        $user->phone = $request->phone;

        if ($user->save()) {
            return new UserResource($user);
        }
    }
}
