<?php

namespace App\Http\Controllers\Auth\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


use App\Http\Requests\TeacherRegistrationRequest;
use App\Notifications\VerifyEmailTeacher;
use App\Department;

use App\Teacher;
use App\Faculty;
use App\Subject;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
    * Where to redirect users after registration.
    *
    * @var string
    */
    protected $redirectTo = '/';

    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
    * Show the application registration form.
    *
    * @return \Illuminate\Http\Response
    */
    public function showRegistrationForm()
    {
        $faculties = Faculty::orderBy('name', 'asc')->get();
        $departments = Department::orderBy('name', 'asc')->get();
        $subjects = Subject::orderBy('name', 'asc')->get();
        return view('frontend.auth.teachers.register')
        ->with('faculties', $faculties)
        ->with('departments', $departments)
        ->with('subjects', $subjects);
    }

    public function register(TeacherRegistrationRequest $request)
    {
        //Our Works

        $teacher = new Teacher;
        $teacher->first_name = $request->first_name;
        $teacher->last_name = $request->last_name;
        $teacher->email = $request->email;
        $teacher->phone_no = $request->phone_no;

        $teacher->faculty_id = $request->faculty;
        $teacher->department_id = $request->department;
        $teacher->designation = $request->designation;
        $teacher->address = $request->address;
        $teacher->password = Hash::make($request->password);
        $teacher->username = str_slug($request->first_name.''.$request->last_name);
        $teacher->verify_token = str_random(50);
        $teacher->save();


        //Add these in student_subject table also(please consider this if we want to keep this field for teacher or not)
        // $teacher->subjects()->sync($request->favorite_subjects, false);

        //Add Student Default Recommendation Also
        $teacher->userSettings()->create([
            'recommended_types'  => 'My Recommended'
        ]);

        //Send a confimration mail to the user email Account
        $teacher->notify(new VerifyEmailTeacher($teacher));

        $request->session()->flash('message', 'You are registered successfully and a verification mail has sent to you !!');
        return redirect()->route('teacher.verification', [$teacher->id, $teacher->verify_token]);

    }

}
