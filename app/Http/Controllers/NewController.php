<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Google\Cloud\Translate\V2\TranslateClient
use Illuminate\Support\Facades\Session;
use Throwable;

class NewController extends Controller
{
    /***
     * Funciones que dada una cadena de consulta que se enviará a la API de FatSecret 
     * ejecutará la conexión cURL con la API y se obtendrá la respuesta en formato JSON
     * después decodifica la respuesta JSON en un array asociativo de PHP
     * y devuelve la vista con los datos de las recetas obtenidos de la API
     *  */
    public function listRecipes(Request $request)
    {
        if ($request->has('recipes')) {
            $texto_busqueda = $request->input('recipes');
            if ($texto_busqueda != "") {

                $datos = $this->callApiRecipesSearch($texto_busqueda);
                return view('vista_recipes', ['recipeList' => $datos]);
            } else {
                $qry_str          = "?method=recipes.search.v3&format=json&page_number=20";
                $curlData         = $this->ejecutarCurl($qry_str);
                $datos = json_decode($curlData, true);
                return view('vista_recipes', ['recipeList' => $datos['recipes']['recipe']]);
            }
        } else {
            $qry_str          = "?method=recipes.search.v3&format=json&page_number=20";
            $curlData         = $this->ejecutarCurl($qry_str);
            $datos = json_decode($curlData, true);
            return view('vista_recipes', ['recipeList' => $datos['recipes']['recipe']]);
        }
    }

    public function searchRecipes(Request $request)
    {
        try {
            $datos = [];
            switch ($request->input('action')) {

                case 'search':

                    if ($request->has('searchRecipe')) {

                        $texto_busqueda = $request->input('searchRecipe');


                        //$datos = $this->callApiFoodsSearch($texto_busqueda);
                        $datos = $this->callApiRecipesSearch($texto_busqueda);

                        return view('vista_menu', ['recipeList' => $datos]);
                    }

                    break;


                case 'add':
                    try {

                        $texto_franja = $request->input('selectFranja');

                        $selectRecipe = $request->input('selectRecipe');

                        // busca el identificador ":" dentro de la cadena y lo guarda en un array
                        $parts = explode(':', $selectRecipe);
                        $id = $parts[0];
                        $name = $parts[1];
                        if ($texto_franja != "" && $selectRecipe != "") {
                            if ($texto_franja == 1) {

                                Session::put('selectedBreakfast', $name);
                                Session::put('selectedBreakfast_id', $id);
                            } else if ($texto_franja == 2) {

                                Session::put('selectedLunch', $name);
                                Session::put('selectedLunch_id', $id);
                            } else if ($texto_franja == 3) {

                                Session::put('selectedSnack', $name);
                                Session::put('selectedSnack_id', $id);
                            } else if ($texto_franja == 4) {

                                Session::put('selectedDinner', $name);
                                Session::put('selectedDinner_id', $id);
                            }
                        }

                        break;
                    } catch (Throwable $e) {
                        report($e);
                        Session::flash('error', 'Se produjo un error: ' . $e->getMessage());
                        return redirect()->back();
                    }
            }
            return view('vista_menu');
        } catch (Throwable $e) {
            report($e);

            return view('vista_menu');
        }
    }

    public function searchFoods(Request $request)
    {
        try {

            $datos = [];


            if ($request->has('searchFood')) {
                $texto_busqueda = $request->input('searchFood');
                $datos = $this->callApiFoodsSearch($texto_busqueda);
                return view('vista_food', ['foodList' => $datos]);
            }

            return view('vista_food');
        } catch (Throwable $e) {
            report($e);
            return view('vista_food');
        }
    }

    public function callApiRecipesSearch(string $texto_busqueda)
    {
        $datos = [];

        $qry_str          = '?method=recipes.search.v3&format=json&search_expression=' . $texto_busqueda;
        $curlData         = $this->ejecutarCurl($qry_str);
        $datosRecipesList = json_decode($curlData, true);

        if (isset($datosRecipesList['recipes']) && isset($datosRecipesList['recipes']['recipe'])) {
            $datos = $datosRecipesList['recipes']['recipe'];
        }

        return $datos;
    }

    private function callApiFoodsSearch(string $texto_busqueda)
    {
        $datos = [];

        $qry_str       = '?method=foods.search&format=json&search_expression=' . $texto_busqueda;
        $curlData      = $this->ejecutarCurl($qry_str);
        $datosFoodList = json_decode($curlData, true);

        if (isset($datosFoodList['foods']) && isset($datosFoodList['foods']['food'])) {
            $datos = $datosFoodList['foods']['food'];
        }

        return $datos;
    }

    public function getRecipes($valor)
    {
        $id_recipe = $valor;
        $qry_str      = '?method=recipe.get.v2&recipe_id=' . $id_recipe . '&format=json';
        $curlData     = $this->ejecutarCurl($qry_str);
        $datosRecipes = json_decode($curlData, true);


        return view('vista_recipe_description', ['recipes' => $datosRecipes['recipe']]);
    }

    public function getFood($valor)
    {
        $id_recipe = $valor;
        $qry_str   = '?method=food.get.v2&food_id=' . $id_recipe . '&format=json';
        $curlData  = $this->ejecutarCurl($qry_str);
        $datosFood = json_decode($curlData, true);
        //print_r($datosFood);

        return view('vista_food_description', ['datosfood' => $datosFood['food']]);
    }


    /**
     * 
     * realiza una solicitud cURL a una API REST, con los parámetros especificados en $qry_str, 
     * incluyendo el token de autorización obtenido a través del método solicitarToken(). 
     * Luego, ejecuta la solicitud cURL, cierra la sesión y devuelve la respuesta de la API en formato JSON.
     * @param mixed $qry_str
     * @return bool|string
     */
    public function ejecutarCurl($qry_str)
    {
        $url     = 'https://platform.fatsecret.com/rest/server.api';
        $headers = array(
            'Authorization: Bearer ' . $this->solicitarToken(),
        );
        $curl    = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url . $qry_str);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($curl);
        curl_close($curl);

        return $data;
    }

    /**
     * Función que olicita un token de acceso a la API de FatSecret mediante el flujo de autenticación de 
     * credenciales de cliente. 
     * Para ello, se utiliza la URL de autenticación, el ID de cliente y el secreto de cliente proporcionados.
     * Se inicia una sesión cURL, se establecen las opciones necesarias y se ejecuta la solicitud. 
     * El resultado se decodifica a formato JSON y se devuelve el token de acceso.
     * @return mixed
     * 
     */
    public function solicitarToken()
    {
        $url            = 'https://oauth.fatsecret.com/connect/token';
        $clienteID      = '05f6f08122ac4adebe6e08096e1a7bc3';
        $clienteSecreto = 'ab57bdc41a4b4daaaff5dc393ece1f8d';

        $opciones = array(
            'grant_type' => 'client_credentials',
            'scope' => 'basic',
            'client_id' => $clienteID,
            'client_secret' => $clienteSecreto,
        );

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_POST, true);

        curl_setopt($curl, CURLOPT_POSTFIELDS, $opciones);

        $data = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($data, true);
        return $data['access_token'];
    }
}
