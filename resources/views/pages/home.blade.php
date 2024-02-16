@extends('layouts.guest')

@section('title', 'Beranda')

@section('content')
  <h1 class="text-3xl text-red-500">bagaimana menjadi seorang backend developer</h1>
  @auth
    <p>{{ Auth::user()->email }}</p>
    <a href="{{ route('logout') }}">Logout</a>
  @endauth

  @guest
    <a href="{{ route('login') }}">Login</a>
  @endguest
@endsection
