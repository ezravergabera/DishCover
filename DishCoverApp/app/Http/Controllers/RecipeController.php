<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use App\Services\EdamamService;

class RecipeController extends Controller
{
    protected $edamamService;

    public function __construct(EdamamService $edamamService)
    {
        $this->edamamService = $edamamService;
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $recipes = $this->edamamService->searchRecipes($query);

        return view('search.recipes', ['recipes' => $recipes]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // // try {
        //     $response = Http::get('https://api.edamam.com/search', [
        //         'q' => $request->query('q', ''),
        //         'app_id' => config('services.edamam.app_id'),
        //         'app_key' => config('services.edamam.app_key'),
        //         'from' => 0,
        //         'to' => 10
        //     ]);
    
        //     // $response->throw();

        //     dump([
        //         'app_id' => config('services.edamam.app_id'),
        //         'app_key' => config('services.edamam.api_key')
        //     ]);
    
        //     $recipes = $response->json();
            
        //     dump($recipes);
    
        //     // return view("search.recipes", ['recipes' => $recipes]);
        // // } catch (\Exception $e) {
        // //     // Log the error and return an error view or redirect
        // //     \Log::error('Edamam API error: ' . $e->getMessage());
        // //     return view("search.error", ['message' => 'An error occurred while fetching recipes.']);
        // // }
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {
        //
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
        //
    }
}
