<?php

namespace App\Controllers\Rest;

use App\Models\Categories;
use CodeIgniter\RESTful\ResourceController;

class CategoriesController extends ResourceController
{
   
    protected $category= "app\Models\CategoriesModel"; 
    protected $format= "json";
    
        public function index($id="")
    {
        try{
            $data = "Tu consulta no existe";
            $categories = new Categories();
            $categories = $categories->findCategoriesId($id);
            if($categories !=null){
                return $this->respond($categories, 200, "OK"); 
            }else{
                return $this->respond($data, 404, "Tu consulta no existe");
            }
        }catch(\Exception $e){
            return $this->respond(null, 500, "Error ");
            return $this->respond($e->getMessage(), 500, "Error grave");
        }
        
    }
}
