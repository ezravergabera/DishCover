<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use App\Services\EdamamService;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    protected $edamamService;

    public function __construct(EdamamService $edamamService)
    {
        $this->edamamService = $edamamService;
    }

    public function search(Request $request)
    {
        session()->forget('recipes');
        session()->forget('recipe');
        $query = $request->input('query');
        $recipes = $this->edamamService->searchRecipes($query);

        session(['recipes' => $recipes]);

        return view('search.recipes', ['recipes' => $recipes]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $recipes = Recipe::where('user_id', $user->id)->get();

        return view('savedRecipes.index', ['recipes'=> $recipes]);
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
            'recipe_image'=> 'nullable|string',
            'recipe_label'=> 'required|string',
            'recipe_ingredients'=> 'required|json',
            'recipe_url'=> 'nullable|string',
        ]);

        $userId = Auth::id();

        $existingRecipe = Recipe::where('recipe_label', $data['recipe_label'])
                                ->where('user_id', $userId)
                                ->first();

        if ($existingRecipe) {
            return back()->with('error', 'Recipe is already saved for this user.');
        }

        $recipe = Recipe::create([
            'user_id' => $userId,
            'recipe_image' => $data['recipe_image'],
            'recipe_label' => $data['recipe_label'],
            'recipe_ingredients' => json_decode($data['recipe_ingredients'], true),
            'recipe_url' => $data['recipe_url'],
        ]);

        return back()->with('success', 'Recipe saved successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function showJSON(Request $request, $name)
    {
        session(['bookmark' => false]);
        $userId = Auth::id();
        $recipes = session('recipes')['hits'];

        foreach($recipes as $recipe) {
            if($recipe['recipe']['label'] == $name) {
                $matched_recipe = $recipe['recipe'];
            }
        }

        $bookmark = Recipe::where('recipe_label', $matched_recipe['label'])
                            ->where('user_id', $userId)
                            ->first();

        if($bookmark) {
            session(['bookmark' => true]);
        }

        session(['recipe' => $matched_recipe]);

        return view('viewRecipe.index', ['name' => $name]);
    }

    public function show(Recipe $recipe, $name)
    {
        $data = Recipe::where('recipe_label', $name)->firstOrFail();    

        // dd($data);
        
        return view('viewRecipe.index', ['recipe'=> $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();

        return redirect(route('savedRecipes.index'))->with('success', 'Saved Recipe Removed.');
    }
}
