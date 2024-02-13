@extends('layouts.guest')

@section('title', 'Beranda')

@section('content')
  <h1>hello</h1>
  @auth
    <p>{{ Auth::user()->email }}</p>
    <a href="{{ route('logout') }}">Logout</a>
  @endauth

  @guest
    <a href="{{ route('login') }}">Login</a>
  @endguest
@endsection
