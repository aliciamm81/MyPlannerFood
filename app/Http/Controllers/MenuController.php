<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\menu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Throwable;


class MenuController extends Controller
{


    function createMenu(Request $request)
    {
        try {


            $menu                      = new menu();
            $menu->dia                 = $request->input('day');
            $menu->id_recipe_breakfast = $request->input('selectedBreakfast_id');
            $menu->name_breakfast      = $request->input('selectedBreakfast');


            $menu->id_recipe_lunch = $request->input('selectedLunch_id');
            $menu->name_lunch      = $request->input('selectedLunch');


            $menu->id_recipe_snack = $request->input('selectedSnack_id');
            $menu->name_snack      = $request->input('selectedSnack');


            $menu->id_recipe_dinner = $request->input('selectedDinner_id');
            $menu->name_dinner      = $request->input('selectedDinner');


            $menu->name    = $request->input('menuName');
            $menu->user_id = Auth::user()->id;

            $menu->save();

            $this->deleteSession();
            return view('vista_menu');
        } catch (Throwable $e) {
            report($e);
            Session::flash('error', 'Se produjo un error: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function deleteSession()
    {

        session()->forget('selectedBreakfast_id');
        session()->forget('selectedBreakfast');
        session()->forget('selectedLunch_id');
        session()->forget('selectedLunch');
        session()->forget('selectedSnack_id');
        session()->forget('selectedSnack');
        session()->forget('selectedDinner_id');
        session()->forget('selectedDinner');
        session()->forget('day');
        session()->forget('menuName');
    }

    function listmenu()
    {
        $user = Auth::user()->id;

        $menus = DB::table('menus')
            ->select(
                'id',
                'name',
                'dia',
                'user_id',
                'id_recipe_breakfast',
                'name_breakfast',
                'id_recipe_lunch',
                'name_lunch',
                'id_recipe_snack',
                'name_snack',
                'id_recipe_dinner',
                'name_dinner',
            )
            ->where('user_id', '=', $user)
            ->orderBy('name')
            ->get();

        return view('vista_menu_create', ['menus' => $menus]);
    }
}
