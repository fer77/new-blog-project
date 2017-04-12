<?php

namespace App\Http\Controllers;

use App\User;
use App\Mail\Welcome;

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
      //* Send new users a welcome email:
      //* we can do that by using the Mail facade.
      \Mail::to($user)->send(new Welcome($user)); //* php artisan look up make:mail.
      //* php artisan make:mail Welcome
      //* update our Mail/Welcome.php with our email name template.
      //* update our .env file with the email driver.

      //* Redirect to HP.
      return redirect()->home();
    }
}
