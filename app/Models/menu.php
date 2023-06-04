<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    use HasFactory;
    protected $table = 'menus';
    protected $fillable = [
        'dia',
        'name',
        'id_recipe_breakfast',
        'name_breakfast',
        'id_recipe_lunch',
        'name_lunch',
        'id_recipe_snack',
        'name_snack',
        'id_recipe_dinner',
        'name_dinner',
        'user_id',

    ];
    public function user()
    {
        return $this->hasMany(User::class);
    }
}


