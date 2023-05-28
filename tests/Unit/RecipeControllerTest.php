<?php
/*
namespace Tests\Unit;

use App\Models\User;
use App\Http\Controllers\RecipeController;
use Illuminate\Http\Request;
use Tests\TestCase;

class RecipeControllerTest extends TestCase
{
    public function testCreateRecipe()
    {
        $controller = new RecipeController();

        $response = $controller->createRecipe();

        $this->assertInstanceOf(\Illuminate\View\View::class, $response);
    }

    public function testSaveRecipe()
    {
        $controller = new RecipeController();

        $user = User::factory()->create();
        $this->actingAs($user); // Simular usuario autenticado

        $request = new Request();
        $request->merge([
            'id' => 1,
            'recipe_name' => 'Tomato soup',
            'recipe_description' => 'Delicious tomato soup',
            'ingredient' => 'Tomato',
            'steps' => 'Several steps',
            'time' => 10,
            'calories' => 10,
            'carbohydrate' => 10,
            'fat' => 10,
            'protein' => 10,
            'recipe_image' => 'image'
        ]);

        $response = $controller->saveRecipe($request);

        $this->assertInstanceOf(\Illuminate\Http\RedirectResponse::class, $response);
    }

    public function testListRecipesUsers()
    {
        $controller = new RecipeController();

        $response = $controller->listRecipesUsers();

        $this->assertInstanceOf(\Illuminate\View\View::class, $response);
        $this->assertArrayHasKey('recipes', $response->getData());
    }

    public function testRecipeUserDescription()
    {
        $controller = new RecipeController();
        $valor = 1;

        $response = $controller->recipeUserDescription($valor);

        $this->assertInstanceOf(\Illuminate\View\View::class, $response);
        $this->assertArrayHasKey('recipes', $response->getData());
    }
}*/
