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
        CLI::write("Realizando petición ...");
        CLI::write("Peticion realizada correctamente");
        CLI::write("Pokemons obtenidos:");

        //$result = json_decode($response, true);

        //foreach($result as $noticia){   
            //CLI::write( " - " . $noticia->name);
        //}

        CLI::write($api);

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
