<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use Faker\Factory;

class Users extends Seeder
{
    public function run()
    {
        $this->db->table('users')->where("id > ", 0)->delete();

        $this->db->query("ALTER TABLE users AUTO_INCREMENT=1");

        $usersBuilder = $this->db->table('users');

        $faker = Factory::create();

        $users = [];

        for($i =1; $i<=20; $i++){
            $users[] = [
                'username' => $faker->username,
                'email' => $faker->email,
                'password' => password_hash($faker->password, PASSWORD_DEFAULT),
                'name' => $faker->name,
                'surname' => $faker->surname,
                'rol_id' => $faker->rol_id,
                'created_at'  =>Time::createFromTimestamp($faker->unixTime()),
                'updated_at'  => Time::now()
            ];
        }

        $usersBuilder->insertBatch($users);
    }
}
