<?php

namespace App\Http\Controllers;

use App\User;

class RegistrationController extends Controller
{
    public function create()
    {
    	return view('registration.create');
    }
    //* The user submits their registration in create.blade.php, and hits this method:
    public function store()
    {
      //* Here we will:
      //* Validate the form.
      $this->validate(request(), [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed'
      ]);
      //* Create and save the user.
      $user = User::create(request(['name', 'email', 'password']));
      //* sign in the user.
      auth()->login($user);
      //* Redirect to HP.
      return redirect()->home();
    }
}
