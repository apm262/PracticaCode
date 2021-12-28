<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use Faker\Factory;

class Roles extends Seeder
{
    public function run()
    {
        $this->db->table('roles')->where("id > ", 0)->delete();

        $this->db->query("ALTER TABLE roles AUTO_INCREMENT=1");

        $rolesBuilder = $this->db->table('roles');

        $faker = Factory::create();


        $roles = [];

       
        $roles = [[
            'name' => 'admin',
            'created_at'  =>Time::createFromTimestamp($faker->unixTime()),
            'updated_at'  => Time::now()
        ],
        [
            'name' => 'app_client',
            'created_at'  =>Time::createFromTimestamp($faker->unixTime()),
            'updated_at'  => Time::now()
        ]];

        $rolesBuilder->insertBatch($roles);
    }
}
