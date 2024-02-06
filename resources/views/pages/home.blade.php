@extends('layouts.guest')

@section('title', 'Beranda')

@section('content')
    {{-- @include('components.earnings-card')
    @include('components.transaction-card')
    @include('components.detail-transaction-card') --}}
    <h1>hello</h1>
    @auth
        <p>{{ Auth::user()->email }}</p>
        <a href="{{ route('logout') }}">Logout</a>
    @endauth

    @guest
        <a href="{{ route('login') }}">Login</a>
    @endguest
@endsection
