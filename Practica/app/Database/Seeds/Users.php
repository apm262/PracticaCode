<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
    public function run()
    {
        $this->db->table('users')->where("id > ", 0)->delete();

        $this->db->query("ALTER TABLE users AUTO_INCREMENT=1");

        $usersBuilder = Factory::create();

        $users = [];

        for($i =1; $i<=20; $i++){
            $users[] = [
                'username' => $faker->username,
                'email' => $faker->email,
                'password' => $faker->password,
                'name' => $faker->name,
                'surname' => $faker->surname,
                'rol_id' => $faker->rol_id
            ];
        }

        $usersBuilder->insertBatch($users);
    }
}
