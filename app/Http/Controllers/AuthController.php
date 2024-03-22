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
      Alert::toast('Signin successfully!', 'success');

      if (Auth::user()->role_id === 1) {
        return redirect()->route('admin.dashboard');
      } elseif (Auth::user()->role_id === 2) {
        return redirect()->route('seller.dashboard');
      } elseif (Auth::user()->role_id === 3) {
        return redirect()->route('customer.home');
      }
    } elseif ($request->password != User::where('password')) {
      Alert::toast('Signin failed!', 'error');
      return redirect()->back()->withInput(['email' => $request->email])->withErrors(['password' => 'Password anda tidak sesuai',]);
    }
  }

  public function signup(SignupRequest $request)
  {
    User::create([
      'name' => $request->name,
      'email' => $request->email,
      'role_id' => 3,
      'password' => $request->password,
    ]);

    Alert::toast('Signup successfully!', 'success');
    Auth::user()->role_id == 2
      ? redirect()->route('seller.dashboard')
      : redirect()->route('customer.dashboard');
  }

  public function logout(Request $request)
  {
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    Alert::toast('Logout successfully!', 'info');
    return redirect('/');
  }
}
