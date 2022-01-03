<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;

class RolesController extends BaseController
{
    public function index()
    {
        $data=array(
            "title"=>"Roles",
        );
        return view("Administration/roles",$data);
    }
}
