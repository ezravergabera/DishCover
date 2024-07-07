<?php

namespace App\Http\Controllers;

use App\Models\Grocery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroceryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $grocery = Grocery::where('user_id', $user->id)->get();

        return view("grocery.index", ["grocery"=> $grocery]);
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
            "ingredient_name"=> "required|string",
            "quantity"=> "required|integer",
        ]);

        $userId = Auth::id();
        
        $existingData = Grocery::where('ingredient_name', $data['ingredient_name'])
                                ->where('user_id', $userId)
                                ->first();

        if ($existingData) {
            return back()->with('error', 'Ingredient is already saved for this user.');
        }

        $ingredient = Grocery::create([
            "ingredient_name"=> $data["ingredient_name"],
            "user_id"=> $userId,
            "quantity"=> $data["quantity"],
        ]);

        $message = $data["ingredient_name"] . " has been added.";

        return redirect(route('grocery.index', ["grocery" => $ingredient]))->with("add-success", $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Grocery $grocery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grocery $grocery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateQuantity(Request $request, $name)
    {
        $userId = Auth::id();

        $ingredient = Grocery::where("ingredient_name", $name)
                                    ->where("user_id", $userId)
                                    ->first();

        $change = $request->get('change');
        $quantityChange = 1;

        if ($change === 'increment') {
            $ingredient->quantity += $quantityChange;
        } else if ($change === 'decrement') {
            if ($ingredient->quantity > 0) {
                $ingredient->quantity -= $quantityChange;
            }
            else {
                return back()->with('error','Quantity cannot be negative.');
            }
        }

        $ingredient->save();

        return back()->with('success', 'Ingredient quantity updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($name)
    {
        $userId = Auth::id();

        $ingredient = Grocery::where("ingredient_name", $name)
                                ->where("user_id", $userId)
                                ->first();

        $ingredient->delete();

        return redirect(route('grocery.index'))->with('delete-success', 'Ingredient Removed.');
    }
}
