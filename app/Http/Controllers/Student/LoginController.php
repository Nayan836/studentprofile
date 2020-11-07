<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{  
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::STUDENT_HOME;

    public function studentLogin(){
        return view('student.auth.login');
    }
    protected function guard()
    {
        return Auth::guard('student');
    }
}
