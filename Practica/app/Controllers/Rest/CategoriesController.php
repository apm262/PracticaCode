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


    public function deleteCategory()
    {
        try{
            $request = $this->request;
            $body = $request->getJSON();

            $cat = new Categories();
            //$category = $cat->where(['id'=>$id])->first();
            $category = $cat->findCategoriesId($body->id);

            if($category){
                $cat->delete(['id'=>$body->id]);
                return $this->respond($category , 200 , "Category deleted");
            }else{
                return $this->respond($category, 404 , "Category not found");
            }
        }catch(\Exception $e){
            return $this->respond(null, 500, "Error grave del servidor");
        }
    }


    public function modifyAdd()
    {
        try{
            $cat = new Categories();
            $request = $this->request;
            $body = $request->getJSON();

            if (isset($body->name)){
                if (isset($body->id)){
                    $category = $cat->where(['id'=>$body->id])->first();
                    if ($category){
                        $category->name= $body->name;
                        $cat->save($category);
                        return $this->respond($category, 200, "Category modify");
                    }else{
                        return $this->respond($category, 404, "Category not found");
                    }
                }else{
                    $newcategory = new Categories();
                    $newcategory->insert([
                        'name'=>$body->name,
                    ]);
                    return $this->respond($newcategory, 200, "Category created right");
                }
            }
        }catch(\Exception $e){
            return $this->respond(null, 500, "Error grave del servidor ");
        }
    }
}
