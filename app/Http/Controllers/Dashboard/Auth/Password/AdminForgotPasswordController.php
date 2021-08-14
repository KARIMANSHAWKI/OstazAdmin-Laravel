<?php

namespace App\Http\Controllers\Dashboard\Auth\Password;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class AdminForgotPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:supervisor');
    }

    public function showLinkRequestForm()
    {
        return view('dashboard.auth.admin-email');
    }


    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);
        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );
        return $response == Password::RESET_LINK_SENT
                    ? $this->sendResetLinkResponse($response)
                    : $this->sendResetLinkFailedResponse($request, $response);
    }

    protected function validateEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);
    }

    protected function sendResetLinkResponse($response)
    {
        return back()->with('status', trans($response));
    }

    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return back()->withErrors(
            ['email' => trans($response)]
        );
    }



    public function broker()
    {
        return Password::broker('supervisors');
    }
}
