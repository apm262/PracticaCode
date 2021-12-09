<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Roles extends Seeder
{
    public function run()
    {
        $this->db->table('roles')->where("id > ", 0)->delete();

        $this->db->query("ALTER TABLE roles AUTO_INCREMENT=1");

        $rolesBuilder = Factory::create();

        $roles = [];

        for($i =1; $i<=20; $i++){
            $roles[] = [
                'name' => $faker->name
            ];
        }

        $rolesBuilder->insertBatch($roles);
    }
}
