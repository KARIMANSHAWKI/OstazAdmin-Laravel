<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class LogoutController extends Controller
{
    public function logout(Request $request) {
        Session::flush();
        return redirect('dashboard/login');
      }
}
