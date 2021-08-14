<?php

namespace App\Http\Controllers\Dashboard\Auth\Password;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Password;
use Auth;

class AdminResetPasswordController extends Controller
{

    use ResetsPasswords;

    protected $redirectTo = '/dashboard/home';

    public function __construct()
    {
        $this->middleware('guest:supervisor');
    }

    public function showResetForm(Request $request, $token = null) {
        return view('dashboard.auth.admin-reset')
            ->with(['token' => $token, 'email' => $request->email]
            );
    }

    protected function guard()
    {
        return Auth::guard('supervisors');
    }

    protected function broker() {
        return Password::broker('supervisors');
    }

}
