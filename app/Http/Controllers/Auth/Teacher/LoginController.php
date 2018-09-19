<?php

namespace App\Http\Controllers\Auth\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Session;
use App\Models\Teacher;


class LoginController extends Controller
{

    use AuthenticatesUsers;


    protected $redirectTo = '/';

    public function __construct(){
        $this->middleware('guest:teacher', ['except' => ['logout']]);
    }


    public function showLoginForm(){
        return view('frontend.auth.teachers.login');
    }

    public function login(Request $request){

        //Validate the form data
        $this->validate($request, [
            'email' 		=> 'required',
            'password' 		=> 'required'
        ]);


        //Attempt to log the employee in
        if (Auth::guard('teacher')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            $teacher = Teacher::where('email', $request->email)->first();
            if (!is_null($teacher)) {
                return redirect()->intended(route('teacher.dashboard'));
            }
        }else{
            Session::flash('login_error', "There is no account by this email and password !!!");
        }

        return redirect()->back()->withInput($request->only('email', 'remember'));
    }


    public function logout()
    {
        Auth::guard('teacher')->logout();
        return redirect()->route('index');
    }
}
