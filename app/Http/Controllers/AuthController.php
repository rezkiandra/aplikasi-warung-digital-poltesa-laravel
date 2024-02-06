<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SigninRequest;
use App\Http\Requests\SignupRequest;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
  public function login()
  {
    return view('pages.auth.login');
  }

  public function register()
  {
    return view('pages.auth.register');
  }

  public function signin(SigninRequest $request)
  {
    $credentials = $request->validate([
      'email' => ['required', 'email'],
      'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();

      return redirect()->route('home');
    }
  }

  public function signup(SignupRequest $request)
  {
    User::create([
      'name' => $request->name,
      'email' => $request->email,
      'level_id' => 3,
      'password' => $request->password,
    ]);

    Alert::success('Success Title', 'Success Message');
    return redirect()->route('login');
  }

  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
  }
}
