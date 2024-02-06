<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
  public function login()
  {
    return view('pages.auth.login');
  }

  public function signin(Request $request)
  {
    return view('pages.auth.register');
  }

  public function register()
  {
    return view('pages.auth.login');
  }

  public function signup(Request $request)
  {
    return view('pages.auth.login');
  }

  public function logout()
  {
    return view('pages.auth.login');
  }
}
