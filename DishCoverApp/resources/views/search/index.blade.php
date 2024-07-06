@extends('layouts.layout')

@section('title', 'DishCover')

@section('style', 'css/styles.css')

@section('header')
    @include('components.headerWithAuth')
@endsection

@section('content')
    <div class="app-name">DishCover</div>
    <div class="search-container">
        @livewire('search-recipes')
    </div>
    <div id="results"></div>
    <div class="bg1-container"></div>
@endsection