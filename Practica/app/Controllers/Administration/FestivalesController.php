<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;
use App\Database\Migrations\Festivals as MigrationsFestivals;
use App\Entities\Festivals as EntitiesFestivals;
use App\Libraries\UtilLibrary;
use App\Models\Categories;
use App\Models\Festivals;
use CodeIgniter\Exceptions\PageNotFoundException;

class FestivalesController extends BaseController
{
    public function index()
    {
        $data=array(
            "title"=>"Festivales",
        );
        return view("Administration/festivales",$data);
    }
    public function getFestivalsData() {

        $request = $this->request;

        //Obtenemos datos que envía el datatable y que vamos a necesitar
        $limitStart = $request->getVar("start");
        $limitLength =$request->getVar("length");
        $draw = $request->getVar("draw");

        $festM = new Festivals();

        //Obtenemos los elementos que queremos mostrar
        $festivals = $festM->findFestivalsDatatable($limitStart,$limitLength);

        //Obtenemos los elementos totales de la tabla
        $totalRecords = $festM->countAllResults();

        $json_data = array(
            "draw" => $draw,
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalRecords,
            "data" => $festivals
        );

        return json_encode($json_data);

    }
    public function deleteFest() {
        
        try{

            $request = $this->request;
            $data = $request->getJSON();
            $id = $data->id;

            $util = new UtilLibrary();
            $festM = new Festivals();
    
            $festivals = $festM->festivalesDelete($id);

            if ($festivals){

                return $response= $util -> getResponse("OK", "Festival eliminado correctamente", $festivals);

            }else{

                return $response= $util -> getResponse("KO", "El festival no se ha podido eliminar", $festivals);

            }

        }catch(\Exception $e){

            return $util-> getResponse("KO", "Error",$e->getMessage());

        }
        
    }
    public function viewEditFestival($id=""){
        
        // if(empty($id)){  
        //     $data["title"]="Nuevo Festival";
        // }else{    
        //     $data["title"]="Editar Festival";           
        // }
        

        if(strcmp($id,"")===0){

            //Si no llega el id estoy creando
            $data["title"]="Nuevo Festival";
            $data["festival"]=new EntitiesFestivals();
            $catM = new Categories();
            $data["categories"] = $catM->findCategories();

        }else{
            echo "Esta entrando";
            //Si llega corectamente el id estaremos editando
            $fM =new Festivals();

            $festival = $fM->findFestivals($id);
            if(is_null($festival))
                throw PageNotFoundException::forPageNotFound();
            
            //Cambio el titulo y le paso el festival que quiero editar
            $data["title"]="Editar Festival"; 
            $data["festival"]=$festival;

            $catM = new Categories();
            $data["categories"] = $catM->findCategories();


        }
        
        return view ("Administration/festivals_edit", $data);
    }

}

