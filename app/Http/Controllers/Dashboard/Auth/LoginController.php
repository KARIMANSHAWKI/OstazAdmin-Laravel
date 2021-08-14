<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\LoginRequest;
use Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('dashboard.auth.login');
    }

    public function store(LoginRequest $req)
    {
        if (auth()->guard('admin')->attempt(['email' => $req->email, 'password' => $req->password])) {
            return redirect()->intended('/dashboard/home');
        } else{
             return redirect()->back();
        }
    }
}
