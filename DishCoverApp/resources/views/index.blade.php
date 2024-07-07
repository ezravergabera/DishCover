@extends('layouts.layout')

@section('title', 'DishCover')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
@endsection

@section('header')
    @include('components.headerWithoutAuth')
@endsection

@section('content')
    <div class="app-name">DishCover</div>
    <div class="search-container">
        @livewire('search-recipes')
    </div>
    <div id="results"></div>
    <div class="bg1-container"></div>
@endsection