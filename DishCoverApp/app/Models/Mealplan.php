<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mealplan extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "breakfast",
        "lunch",
        "dessert",
        "snacks",
        "dinner",
        "mealplan_day",
    ];
}
