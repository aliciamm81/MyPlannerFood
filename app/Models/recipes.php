<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recipes extends Model
{
    use HasFactory;
    protected $table = 'recipes';
    protected $fillable = [
        'id',
        'recipe_name',
        'recipe_description',
        'ingredient',
        'time',
        'calories',
        'carbohydrate',
        'fat',
        'protein',
        'recipe_image',
        'user_id',
        'steps',
    ];

}
