@extends('layouts.layout')

@section('title', 'DishCover - Log In or Sign Up')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
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
    <form method="POST" action="{{ route('register') }}" class="login-container">
        @csrf
        <div class="name-container">
            <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Name" class="form-control">
        </div>
        <div class="email-container">
            <div class="input-wrapper">
                <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Email Address" class="form-control">
            </div>
        </div>
        <div class="password-container">
            <div class="input-wrapper">
                <input id="password" type="password" name="password" required autofocus autocomplete="new-password" placeholder="Create Password" class="form-control">
            </div>
        </div>
        <div class="confirm-password-container">
            <div class="input-wrapper">
                <input id="password_confirmation" type="password" name="password_confirmation" required autofocus autocomplete="new-password" placeholder="Confirm Password" class="form-control">
            </div>
        </div>
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        <div class="login-button-container">
            <button type="submit" class="btn btn-primary btn-block">{{ __('Register') }}</button>
        </div>
    </form>
    <div class="bg1-container"></div>
@endsection

{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
