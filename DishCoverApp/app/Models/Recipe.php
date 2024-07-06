<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "recipe_image",
        "recipe_label",
        "recipe_ingredients",
        "recipe_url"
    ];

    protected $casts = [
        "recipe_ingredients" => "array",
    ];
}
