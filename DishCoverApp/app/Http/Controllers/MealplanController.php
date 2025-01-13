<?php

namespace App\Http\Controllers;

use App\Models\Mealplan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MealplanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();

        $mealplans = Mealplan::where("user_id", $userId)->whereBetween('mealplan_day', [0, 6])->get();

        $weeklymealplans = $mealplans->chunk(7);
        
        return view("mealPlan.index", ["weeklymealplans"=> $weeklymealplans]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "user_id"=> "nullable",
            "breakfast"=> "nullable",
            "lunch"=> "nullable",
            "dessert"=> "nullable",
            "snacks"=> "nullable",
            "dinner"=> "nullable",
            "mealplan_day"=> "nullable",
        ]);

        $userId = Auth::id();

        $existingMealPlans = Mealplan::where('user_id', $userId)
            ->orderBy('mealplan_day', 'asc')
            ->get();

        
            
            if ($existingMealPlans->isEmpty()) {
                $mealplan_day = 0;
            } else {
                $remainingMealPlans = Mealplan::where('user_id', $userId)
                    ->orderBy('id', 'asc')
                    ->get();

                $day = 0;
                foreach ($remainingMealPlans as $remainingMealPlan) {
                    $remainingMealPlan->update(['mealplan_day' => $day]);
                    $day = ($day + 1) % 7;
                }
                $mealplan_day = $day;
            }
            
        $newMealPlan = Mealplan::create([
            "user_id" => $userId,
            "breakfast" => $data['breakfast'],
            "lunch" => $data['lunch'],
            "dessert" => $data['dessert'],
            "snacks" => $data['snacks'],
            "dinner" => $data['dinner'],
            "mealplan_day" => $mealplan_day,
        ]);

        return redirect(route('mealPlan.index'))->with('success','Meal Plan successfully added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mealplan $mealplan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mealplan $mealplan)
    {
        return view('mealplans.edit', compact('mealplan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Mealplan $mealplan, Request $request)
    {
        $data = $request->validate([
            "breakfast" => "nullable",
            "lunch" => "nullable",
            "dessert" => "nullable",
            "snacks" => "nullable",
            "dinner" => "nullable",
        ]);

        $mealplan->update([
            "breakfast" => $data['breakfast'],
            "lunch" => $data['lunch'],
            "dessert" => $data['dessert'],
            "snacks" => $data['snacks'],
            "dinner" => $data['dinner'],
        ]);

        return redirect(route('mealPlan.index'))->with('success','Meal Plan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mealplan $mealplan, Request $request)
    {
        $mealplan = Mealplan::findOrFail($mealplan->id);

        $mealplan->delete();

        $userId = Auth::id();
        $remainingMealPlans = Mealplan::where('user_id', $userId)
            ->orderBy('id', 'asc')
            ->get();

        $day = 0;
        foreach ($remainingMealPlans as $remainingMealPlan) {
            $remainingMealPlan->update(['mealplan_day' => $day]);
            $day = ($day + 1) % 7;
        }

        return redirect()->route('mealPlan.index')->with('success', 'Meal Plan deleted successfully.');
    }
}
