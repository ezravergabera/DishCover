<!--  
Program Title: DishCover: Web-Based Food Recipe Search using Edamam API and Meal Planning

Programmers:
- Corpuz, Juan Ramon
- Estoya, Hershey Ann
- Pascual, Harvey T.
- Vergabera, Jose Ezra Nazarene B.
- Yim Gwyneth Anmarie C.
- Lei, Bernard

Where the Program Fits in the General System Design:

Date Written: 
Date Revised:

Purpose: The purpose of this tool is to help college students that is living the dormitories 


Data Structures, Algorithms, and Control:

1. Data Structures:
    - Classes/Functions: Used for recipe searching, grocery lists, UI interaction.
    - Arrays: Used in the system, E.G. meal planning to handle values such as the breakfast, lunch, snacks, and dinner values.
    - Lists: Used in the system, E.G. ordering the days of week 

2. Algorithms:
    - String Matchin/Substring Matching: Approach to search recipe that matches the word input. This allows searching for recipe that contain a part of that keyword. 
    - Advanced Filtering: The API allows filtering filtering by specific ingredients or available grocery list.

3. Control:
    - Conditional Logic: Checks input and proceeds the code with the condition met.
    - Event-Driven: Event-driven handles user actions via event listeners.
    - Middleware Control: Handles request such as for authority or the login mechanism of the system.
    - Error Handling: Handles error prompts or messages whether a error condition has met. 

-->


@extends('layouts.layout')

@section('title', 'DishCover')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
@endsection

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