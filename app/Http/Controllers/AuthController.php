<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SigninRequest;
use App\Http\Requests\SignupRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
      Alert::toast('Login Berhasil!', 'success');

      if (Auth::user()->role_id === 1) {
        return redirect()->route('admin.dashboard');
      } elseif (Auth::user()->role_id === 2) {
        return redirect()->route('seller.dashboard');
      } elseif (Auth::user()->role_id === 3) {
        return redirect()->route('customer.home');
      }
    } elseif ($request->password != User::where('password')) {
      Alert::toast('Login Gagal!', 'error');
      return redirect()->back()->withInput(['email' => $request->email])->withErrors(['password' => 'Password anda tidak sesuai',]);
    }
  }

  public function signup(SignupRequest $request)
  {
    User::create([
      'uuid' => Str::uuid('id'),
      'name' => $request->name,
      'slug' => Str::slug($request->name),
      'email' => $request->email,
      'role_id' => 3,
      'password' => Hash::make($request->password),
    ]);

    Alert::toast('Registrasi Berhasil!', 'success');
    return redirect()->route('login');
  }

  public function logout(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    Alert::toast('Logout Berhasil!', 'info');
    return redirect()->route('login');
  }
}
