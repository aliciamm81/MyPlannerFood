<?php

namespace App\Http\Controllers;

//use Google\Cloud\Translate\V2\TranslateClient

class NewController extends Controller
{
    
    public function getAlimentos()
    {
        
        $curlData = $this->ejecutarCurl();
        $datos = json_decode($curlData, true);
        return view('vista_alimentos',['datos'=>$datos]);
    }
    public function ejecutarCurl()
    {   
        $url = 'https://platform.fatsecret.com/rest/server.api';
        $qry_str = "?method=food.get.v2&food_id=1325&format=json";
        $headers = array(
            'Authorization: Bearer '.$this->solicitarToken(),
        );
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url.$qry_str);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($curl);
        curl_close($curl);
      
        return $data;
    }

    public function solicitarToken()
    {
        $url = 'https://oauth.fatsecret.com/connect/token';
        $clienteID = '05f6f08122ac4adebe6e08096e1a7bc3';
        $clienteSecreto = 'ab57bdc41a4b4daaaff5dc393ece1f8d';
        
        $opciones = array(
            'grant_type' => 'client_credentials', 
            'scope' =>'basic',
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
    
  
 /*   
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
