<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;

class SignupController extends Controller
{
    public function index(){
      return view("signup");
    }

    public function signup(){
      $user = new User(); //User is preexisting in the app folder with Laravel and contains most things you need
      $user->email = request("email"); //as you can see, we didn't pass request into the function. That's because it's a global in Laravel! shocking!
      $user->password = Hash::make(request("password"));
      $user->save();

      Auth::login($user); // after they sign up, the Auth::login thing will take over and log them in immediately
      return redirect("/profile"); // then they'll be redirected back to the profile page

    }
}
