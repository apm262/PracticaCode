<?php

namespace App\Controllers\Command;

use App\Controllers\BaseController;
use CodeIgniter\CLI\CLI;
use SimpleXMLElement;

class PrimerosComands extends BaseController
{
    public function comandoUno()
    {
        CLI::write('Hola este es mi primer comando');
    }

    public function comandoDos(){

        $client= service("curlrequest");

        $response = $client->request('GET','https://pokeapi.co/api/v2/pokemon',[]);


        $status = $response->getStatusCode();
        CLI::write("El status es:  " . $status);
        $api = $response->getbody();
        //CLI::write($api);

        CLI::write("---- INICIO obtener pokemons ----");

        //$result = json_decode($response, true);

        //foreach($result as $noticia){   
            //CLI::write( " - " . $noticia->name);
        //}
        $client = service("curlrequest");
        $response = $client->request("GET", "https://pokeapi.co/api/v2/pokemon", []);
        $response->getStatusCode();
        CLI::write("Realizando Peticion..." );

        if($response->getStatusCode()==200){
            CLI::write("Peticion realizada correctamente");
            CLI::write("Obteniedo datos...." );
            /* API URL */
            $url = "https://pokeapi.co/api/v2/pokemon";

            /* Init cURL resource */
            $curl = curl_init($url);
                
            /* set the content type json */
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

            /* set return type json */
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                
            /* execute request */
            $result = curl_exec($curl);

            $result = json_decode($result, true);
            $y =0;
            CLI::write("Pokemons obtenidos:");
            $result = $result['results'];
            for ($i = 0;$i < count($result) ; $i ++ ){
                $y = $y+1;
                $results = $result[$i]['name'];
                CLI::write( $y." ".$results);
            }

            curl_close($curl);
            
        }else{
            CLI::write("Peticion no disponible, error:" );
            CLI::write($response->getStatusCode());
        }

        //CLI::write($api);

        CLI::write("---FIN DEL COMANDO---");

        
    }

    public function comandoTres(){

        $arrContextOptions=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );

        $response = file_get_contents("https://www.villena.es/feed", false, stream_context_create($arrContextOptions));

        $data = new SimpleXMLElement($response);
        $items = $data->channel->item;

        $contador=0;
        foreach($items as $noticia){

            $contador=$contador+1;
            CLI::write($contador . " - " . $noticia->title);
        }
    }
    
   

}
