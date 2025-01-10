@extends('layouts.layout')

@section('title', 'DishCover - Log In or Sign Up')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('header')
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a href="{{ route('index') }}" class="navbar-brand">DishCover</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
        aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarContent"> 
        <div class="user-menu">
            <a href="{{ route('login') }}" class="navbar-login">Login</a>
            <a href="{{ route('register') }}" class="navbar-signup">Signup</a>
        </div>
    </div>
    </nav>
@endsection

@section('content')
    <div class="app-name">DishCover</div>
    <form method="POST" action="{{ route('login') }}" class="login-container">
        @csrf
        <div class="email-container">
            <div class="input-wrapper">
                <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Email Address" class="form-control">
            </div>
        </div>
        <div class="password-container">
            <div class="input-wrapper">
                <input id="password" type="password" name="password" required autofocus autocomplete="current-password" placeholder="Password" class="form-control">
            </div>
        </div>
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
        <div class="login-button-container">
            <button type="submit" class="btn btn-primary btn-block">{{ __('Log in') }}</button>
        </div>
    </form>
    <div class="bg1-container"></div>
@endsection
 
{{--<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}