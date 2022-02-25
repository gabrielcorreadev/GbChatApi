<?php

namespace App\Http\Controllers\Api\V1\Account;

use App\Http\Controllers\Api\AppBaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class VerificationController extends AppBaseController
{
    public function verify($user_id, Request $request) {
        if (!$request->hasValidSignature()) {
            return $this->sendError('Invalid/Expired url provided.', 401);
        }
    
        $user = User::findOrFail($user_id);
    
        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }
    
        return redirect()->to('/');
    }
    
    public function resend(Request $request) {
        if ($request->user()->hasVerifiedEmail()) {
            return $this->sendError('Email já verificado.', 400);
        }
    
        $request->user()->sendEmailVerificationNotification();
    
        return $this->sendSuccess('Link de verificação de e-mail enviado em seu ID de e-mail');
    }
}
