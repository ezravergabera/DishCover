@extends('layouts.layout')

@section('title', 'DishCover')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/mealplan.css') }}">
@endsection

@section('header')
    @include('components.headerWithAuth')
@endsection

@section('content')
    <main class="container">
        <div class="meal-planner">
            <div class="weekly-plan-container">
                {{-- <div class="meal-plan-header">
                    <button class="btn btn-outline-primary1">Weekly Plan</button>
                    <button class="btn btn-outline-primary2">Monthly Plan</button>
                </div> --}}
            <div class="create-meal-container">
                <div class="create-meal">
                    <button style="border: hidden; background-color: #fdf5e6;" onclick="createModalShow()">
                        <img src="{{asset('images/BTN.png')}}" alt="Create Meal">
                    </button> 
                </div>
            </div>
                <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                                <div class="weekly-meal-plan-container">
                                    <div class="background-color">
                                        <form method="POST" action="{{ route('mealPlan.store') }}" class="weekly-meal-plan">
                                            @csrf
                                            @method('post')
                                            <h2>Weekly Meal Plan</h2>
                                            <div>Breakfast: <input name="breakfast" class="Breakfast" type="text" style="border-radius: 10px; border-style: double; border-width: 1px; border-color: #9b6543; margin-left: 10px; padding: 7px; background-color: #f0d1b0;"></div> 
                                            <p>Lunch: <input name="lunch" class="Lunch" type="text" style="border-radius: 10px; border-style: double; border-width: 1px; border-color: #9b6543; margin-left: 36px; padding: 7px; background-color: #f0d1b0;"></p>
                                            <p>Dessert: <input name="dessert" class="Dessert" type="text" style="border-radius: 10px; border-style: double; border-width: 1px; border-color: #9b6543; margin-left: 26px; padding: 7px; background-color: #f0d1b0;"></p>
                                            <p>Snacks: <input name="snacks" class="Snacks" type="text" style="border-radius: 10px; border-style: double; border-width: 1px; border-color: #9b6543; margin-left: 28px; padding: 7px; background-color: #f0d1b0;"></p>
                                            <p>Dinner: <input name="dinner" class="Dinner" type="text" style="border-radius: 10px; border-style: double; border-width: 1px; border-color: #9b6543; margin-left: 30px; padding: 7px; background-color: #f0d1b0;"></p> 
                                            <div class="button-add-meal-plan">
                                                <button type="submit" class="btn btn-success">Add meal plan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="days-container">
                <div class="meal-plan-grid">
                    @foreach ($mealplans as $mealplan)
                        <div class="meal-day1">
                            @if($mealplan->mealplan_day == 0)
                                Monday
                            @elseif($mealplan->mealplan_day == 1)
                                Tuesday
                            @elseif($mealplan->mealplan_day == 2)
                                Wednesday
                            @elseif($mealplan->mealplan_day == 3)
                                Thursday
                            @elseif($mealplan->mealplan_day == 4)
                                Friday
                            @elseif($mealplan->mealplan_day == 5)
                                Saturday
                            @elseif($mealplan->mealplan_day == 6)
                                Sunday
                            @endif                    
                            <div class="background-meal-day">
                                Breakfast: 
                                {{$mealplan->breakfast}}
                                <br>
                                Lunch: 
                                {{$mealplan->lunch}}
                                <br>
                                Dessert: 
                                {{$mealplan->dessert}}
                                <br>
                                Snacks: 
                                {{$mealplan->snacks}}
                                <br>
                                Dinner: 
                                {{$mealplan->dinner}}
                            </div>
                            <div class="Edit-Meals-Delete">
                                <button class="Edit-Meals" onclick="editModalShow({{ $mealplan->toJson() }})">Edit Meals</button>
                                <form method="POST" action="{{ route('mealPlan.destroy', ['mealplan' => $mealplan]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="Delete">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                                <div class="weekly-meal-plan-container">
                                    <div class="background-color">
                                        <form method="POST" action="{{ route('mealPlan.update', ['mealplan' => $mealplan]) }}" id="editMealPlanForm" class="weekly-meal-plan">
                                            @csrf
                                            @method('PUT')
                                            <h2>Weekly Meal Plan</h2>
                                            <div>Breakfast: <input name="breakfast" value="{{ $mealplan->breakfast }}" id="editBreakfast" class="Breakfast" type="text" style="border-radius: 10px; border-style: double; border-width: 1px; border-color: #9b6543; margin-left: 10px; padding: 7px; background-color: #f0d1b0;"></div> 
                                            <p>Lunch: <input name="lunch" value="{{ $mealplan->lunch }}" id="editLunch" class="Lunch" type="text" style="border-radius: 10px; border-style: double; border-width: 1px; border-color: #9b6543; margin-left: 36px; padding: 7px; background-color: #f0d1b0;"></p>
                                            <p>Dessert: <input name="dessert" value="{{ $mealplan->dessert }}" id="editDessert" class="Dessert" type="text" style="border-radius: 10px; border-style: double; border-width: 1px; border-color: #9b6543; margin-left: 26px; padding: 7px; background-color: #f0d1b0;"></p>
                                            <p>Snacks: <input name="snacks" value="{{ $mealplan->snacks }}" id="editSnacks" class="Snacks" type="text" style="border-radius: 10px; border-style: double; border-width: 1px; border-color: #9b6543; margin-left: 28px; padding: 7px; background-color: #f0d1b0;"></p>
                                            <p>Dinner: <input name="dinner" value="{{ $mealplan->dinner }}" id="editDinner" class="Dinner" type="text" style="border-radius: 10px; border-style: double; border-width: 1px; border-color: #9b6543; margin-left: 30px; padding: 7px; background-color: #f0d1b0;"></p> 
                                            <div class="button-add-meal-plan">
                                                <button type="submit" class="btn btn-success">Update Meal Plan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    @include('components.addMealScript')
@endsection