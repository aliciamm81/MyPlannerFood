<?php

namespace Tests\Unit;

use App\Http\Controllers\MenuController;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;


class MenuControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateMenu()
    {

        $user = User::factory()->create();
        $this->actingAs($user);

        $request = new Request();
        $request->merge([
            'day' => 'Monday',
            'selectedBreakfast_id' => 1,
            'selectedBreakfast' => 'Breakfast',
            'selectedLunch_id' => 2,
            'selectedLunch' => 'Lunch',
            'selectedSnack_id' => 3,
            'selectedSnack' => 'Snack',
            'selectedDinner_id' => 4,
            'selectedDinner' => 'Dinner',
            'menuName' => 'My Menu',
        ]);

        $controller = new MenuController();
        $response = $controller->createMenu($request);
        $this->assertInstanceOf(\Illuminate\View\View::class, $response);
        $this->assertEquals('vista_menu', $response->getName());
        $menu = Menu::where('user_id', $user->id)->first();
        $this->assertEquals('Monday', $menu->dia);
        $this->assertEquals(1, $menu->id_recipe_breakfast);
        $this->assertEquals('Breakfast', $menu->name_breakfast);
    }
    /**
     * Crear una sesión falsa con valores predefinidos, 
     * Verificar que los valores de sesión se hayan eliminado correctamente
     */

    public function testDeleteSession()
    {

        session(['selectedBreakfast_id' => 1]);
        session(['selectedBreakfast' => 'Breakfast']);
        session(['selectedLunch_id' => 2]);
        session(['selectedLunch' => 'Lunch']);
        session(['selectedSnack_id' => 3]);
        session(['selectedSnack' => 'Snack']);
        session(['selectedDinner_id' => 4]);
        session(['selectedDinner' => 'Dinner']);
        session(['day' => 'Monday']);
        session(['menuName' => 'My Menu']);

        $controller = new MenuController();
        $controller->deleteSession();

        // 
        $this->assertNull(session('selectedBreakfast_id'));
        $this->assertNull(session('selectedBreakfast'));
        $this->assertNull(session('selectedLunch_id'));
        $this->assertNull(session('selectedLunch'));
        $this->assertNull(session('selectedSnack_id'));
        $this->assertNull(session('selectedSnack'));
        $this->assertNull(session('selectedDinner_id'));
        $this->assertNull(session('selectedDinner'));
        $this->assertNull(session('day'));
        $this->assertNull(session('menuName'));
    }

    /**
     * Simular usuario autenticado
     *  */
    public function testListMenu()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $controller = new MenuController();
        $request = new Request();

        $response = $controller->listmenu();

        $this->assertInstanceOf(\Illuminate\View\View::class, $response);
        $this->assertArrayHasKey('menus', $response->getData());
    }
}
