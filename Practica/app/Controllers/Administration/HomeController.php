<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $data=array(
            "title"=>"Inicio",
        );
        
        return view("Administration/home_admin",$data);
    }
}
