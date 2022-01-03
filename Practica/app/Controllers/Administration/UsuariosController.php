<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;

class UsuariosController extends BaseController
{
    public function index()
    {
        $data=array(
            "title"=>"Usuarios",
        );
        return view("Administration/usuarios",$data);
    }
}
