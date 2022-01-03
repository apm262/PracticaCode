<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;

class FestivalesController extends BaseController
{
    public function index()
    {
        $data=array(
            "title"=>"Festivales",
        );
        return view("Administration/festivales",$data);
    }
}
