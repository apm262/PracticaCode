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
                'surname' => $faker->lastName,
                'rol_id' => '2',
                'created_at'  =>Time::createFromTimestamp($faker->unixTime()),
                'updated_at'  => Time::now()
            ];
        }

        $users[] = [
                    'username' => 'alfonso',
                    'email' => 'alfonsopm08@gmail.com',
                    'password' => password_hash('123', PASSWORD_DEFAULT),
                    'name' => 'Alfonso',
                    'surname' => 'Perez',
                    'rol_id' => '1',
                    'created_at'  =>Time::createFromTimestamp($faker->unixTime()),
                    'updated_at'  => Time::now()
                ];

        //array_push($users,$users_clientes, $users_admin);
        $usersBuilder->insertBatch($users);
    }
}
