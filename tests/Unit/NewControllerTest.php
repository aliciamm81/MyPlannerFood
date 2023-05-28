<?php
/*
namespace Tests\Unit;

use App\Http\Controllers\NewController;
use Illuminate\Http\Request;
use Tests\TestCase;

class NewControllerTest extends TestCase
{
    public function testListRecipes()
    {
        $controller = new NewController();
        $request = new Request();
        $request->merge(['recipes' => 'pizza']);

        $response = $controller->listRecipes($request);

        $this->assertInstanceOf(\Illuminate\View\View::class, $response);
        $this->assertArrayHasKey('recipeList', $response->getData());
    }

    public function testListRecipesWithoutRecipesParam()
    {
        $controller = new NewController();
        $request = new Request();

        $response = $controller->listRecipes($request);

        $this->assertInstanceOf(\Illuminate\View\View::class, $response);
        $this->assertArrayHasKey('recipeList', $response->getData());
    }

    public function testSearchRecipes()
    {
        $controller = new NewController();
        $request = new Request();
        $request->merge(['action' => 'search', 'searchRecipe' => 'pasta']);

        $response = $controller->searchRecipes($request);

        $this->assertInstanceOf(\Illuminate\View\View::class, $response);
        $this->assertArrayHasKey('recipeList', $response->getData());
    }

    public function testSearchRecipesWithInvalidAction()
    {
        $controller = new NewController();
        $request = new Request();
        $request->merge(['action' => 'invalid', 'searchRecipe' => 'pasta']);

        $response = $controller->searchRecipes($request);

        $this->assertInstanceOf(\Illuminate\View\View::class, $response);
        $this->assertArrayNotHasKey('recipeList', $response->getData());
    }
}*/
