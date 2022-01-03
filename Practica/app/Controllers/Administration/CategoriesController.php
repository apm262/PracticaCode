<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;

class CategoriesController extends BaseController
{
    public function index()
    {
        $data=array(
            "title"=>"Categorias",
        );
        return view("Administration/categorias",$data);
    }
}
