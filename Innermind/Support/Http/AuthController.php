<?php

namespace Innermind\Support\Http;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    use SendsPasswordResetEmails, AuthenticatesUsers, RegistersUsers, ResetsPasswords {
        AuthenticatesUsers::credentials insteadof ResetsPasswords;
        ResetsPasswords::credentials as creds;
        ResetsPasswords::broker insteadof SendsPasswordResetEmails;
        AuthenticatesUsers::guard insteadof SendsPasswordResetEmails, ResetsPasswords;
        AuthenticatesUsers::redirectPath insteadof ResetsPasswords;
        AuthenticatesUsers::redirectPath insteadof RegistersUsers;
        AuthenticatesUsers::guard insteadof RegistersUsers;
    }

    /**
     * Override the method for 2 reasons.
     * 1) We aliased a method due to conflicting issues. (`creds`)
     * 2) In order to respond with a Toastr "flash" response.
     */
    public function reset(Request $request)
    {
        $this->validate($request, $this->rules(), $this->validationErrorMessages());

        $response = $this->broker()->reset(
            $this->creds($request), function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

        if($response == Password::PASSWORD_RESET) {

            toastr()->success('Your password has been reset.', 'Success!');

            return $this->sendResetResponse($response);
        }

        return $this->sendResetFailedResponse($request, $response);
    }
}
