<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Roles extends Entity
{
    protected $attributes = [
        'id' => null,
        'name' => null
    ];
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}

// $data = [
//     "name" => "Admin"
// ];

// $cat = new Roles($data);

// $cat2 = new Roles();
// $cat2->fill($data);
