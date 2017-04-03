<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
  public function __construct()
    {
      $this->middleware('guest', ['except' => 'destroy']); //* only guests will make it through this filter.
    }

  public function create()
    {
      return view('sessions.create');
    }
  public function store()
    {
      //* Attempt to authenticate the user.
      if (!auth()->attempt(request(['email', 'password']))) {
        //* If not, redirect back.
        return back()->withErrors([
          'message' => 'Please check your email and password.'
        ]);
          //* If so, sign them in.
      };
            //* attempt() will take care of comparing these credentials to the DB and automatically sign the user in if they match.
      //* Redirect to the HP.
      return redirect()->home();
    }
    public function destroy()
    {
      auth()->logout();

      return redirect()->home();
    }
}
