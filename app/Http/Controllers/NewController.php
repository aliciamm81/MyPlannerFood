<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Google\Cloud\Translate\V2\TranslateClient

class NewController extends Controller
{
    /***
     * Funciones que dada una cadena de consulta que se enviará a la API de FatSecret 
     * ejecutará la conexión cURL con la API y se obtendrá la respuesta en formato JSON
     * después decodifica la respuesta JSON en un array asociativo de PHP
     * y devuelve la vista con los datos de las recetas obtenidos de la API
     *  */
    public function searchRecipes()
    {
        $qry_str = "?method=recipes.search.v3&format=json";
        $curlData = $this->ejecutarCurl($qry_str);
        $datosRecipesList = json_decode($curlData, true);
        return view('vista_recipes', ['recipeList' => $datosRecipesList['recipes']['recipe']]);
    }
    public function getFood()
    {
        $qry_str = "?method=food.get.v2&food_id=1325&format=json";
        $curlData = $this->ejecutarCurl($qry_str);
        $datosFood = json_decode($curlData, true);
        return view('vista_food', ['food' => $datosFood]);
    }

    public function searchFood(Request $request)
    {
        echo 'inicio ';
        $datos = [];
        if ($request->has('searchFood')) {
            $texto_busqueda = $request->input('searchFood');
            echo $texto_busqueda;

            $qry_str = '?method=foods.search&format=json&search_expression=' . $texto_busqueda;
            $curlData = $this->ejecutarCurl($qry_str);
            $datosFoodList = json_decode($curlData, true);

            if (isset($datosFoodList['foods']) && isset($datosFoodList['foods']['food'])) {
                $datos = $datosFoodList['foods']['food'];
            }
        }
        echo " fin";

        return view('vista_menu', ['foodList' => $datos]);
    }
    public function getRecipes()
    {
        $qry_str = "?method=recipe.get.v2&recipe_id=68845510&format=json";
        $curlData = $this->ejecutarCurl($qry_str);
        $datosRecipes = json_decode($curlData, true);

        return view('vista_recipes', ['recipe' => $datosRecipes]);
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
        $url = 'https://platform.fatsecret.com/rest/server.api';
        $headers = array(
            'Authorization: Bearer ' . $this->solicitarToken(),
        );
        $curl = curl_init();
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
        $url = 'https://oauth.fatsecret.com/connect/token';
        $clienteID = '05f6f08122ac4adebe6e08096e1a7bc3';
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


    /* Esta función es para intentar traducir la página pero no he conseguido que funcione  
    public function translateJson()
    {
        $json = '{"name": "John", "age": 30, "city": "New York"}';
        $array = json_decode($json, true);
    
        $key = 'YOUR_AZURE_TRANSLATOR_TEXT_KEY';
        $endpoint = 'YOUR_AZURE_TRANSLATOR_TEXT_ENDPOINT';
    
        $client = new TranslatorTextAPI($key, $endpoint);
    
        foreach ($array as $key => $value) {
            $params = array(
                "api-version" => "3.0",
                "from" => "en",
                "to" => "es",
                "textType" => "plain"
            );
            $body = array(
                array(
                    'text' => $value
                )
            );
            $serializer = new XmlSerializer();
            $response = $client->translateArray($body, $params);
    
            $translated = $response[0]['translations'][0]['text'];
            $array[$key] = $translated;
        }
    
        return response()->json($array);
    }*/
    /*   
    public function login ($usr,$key){

        if (isset($_POST["enviar"])){
            $name = $_POST["usuario"];
            $passw = $_POST["passw"];
        }else {
            $name = "";
            $passw = "";
        }
        if ($name != "" && $passw != "") {

            if ($name == $usr && crypt($passw,'$1$somethin$') == $key) {
            
                $id = session_id();
                $_SESSION["usuario"] = $name;
                header("Location:sesion.php");
            } else {
                $mensaje = "Credenciales incorrectas";
            }
        } else $mensaje="Introduza algún valor";

    }*/
}
