<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\ValidationException;
use function Pest\Laravel\handleExceptions;

class SessionController extends Controller
{
    //
    public function registerPage()
    {
            return view('auth.register');
    }

    public function doRegister()
    {
        $userAttributes=\request()->validate([
            'name'=>['required'],
            'email'=>['required','email','unique:users,email'],
            'password'=>['required','confirmed']
        ]);
        $employerAttributes=\request()->validate([
            'employer'=>['required'],
            'logo'=>['image']
        ]);

        if(isset($employerAttributes['logo'])){
            $temp=\request()->logo->store('logos');
            $employerAttributes['logo']=$temp;
        }

        // Rename 'employer' key to 'name' cuz the database in employer table the column is name
        $employerAttributes['name'] = $employerAttributes['employer'];
        unset($employerAttributes['employer']); // Optionally remove the old 'employer' key


        $user= User::create($userAttributes);
        $user->employer()->create($employerAttributes);

        \Auth::login($user);

        return redirect('/');
    }

    public function loginPage()
    {
        return view('auth.login');
    }
    public function doLogin()
    {
        $attributes=\request()->validate([
            'email'=>['required','email'],
            'password'=>['required']
        ]);

        if(! \Auth::attempt($attributes)){
            throw ValidationException::withMessages(['email'=>'sorry, wrong credentials ']);
        }
        \request()->session()->regenerate();
        return redirect('/');
    }

    public function logout()
    {
        \Auth::logout();
        return redirect('/');
    }
}
