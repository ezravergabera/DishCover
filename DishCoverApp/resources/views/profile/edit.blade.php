@extends('layouts.layout')

@section('title', 'DishCover')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('title', 'DishCover')

@section('header')
    @include('components.headerEditProfilewithAuth')
@endsection

@section('content')
    <div class="profile-container">
        <div class="edit-profile">
            <div class="edit-email">
                <div class="email-container">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
            <div class="edit-password">
                <div class="password-container">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
            <div class="delete-account">
                <div class="delete-container">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
@endsection