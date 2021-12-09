<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use Faker\Factory;

class Categories extends Seeder
{
    public function run()
    {
        $this->db->table('categories')->where("id > ", 0)->delete();

        $this->db->query("ALTER TABLE categories AUTO_INCREMENT=1");

        $categoriesBuilder = $this->db->table('categories');

        $faker = Factory::create();

        $categories = [];

        $categories[] = [
            'name' => 'Indie',
            'created_at' => Time::createFromTimestamp($faker->unixTime()),
            'updated_at'  => Time::now()
        ];
        
        $categories[] = [
            'name' => 'Rock',
            'created_at' => Time::createFromTimestamp($faker->unixTime()),
            'updated_at'  => Time::now()
        ];
        

        $categoriesBuilder->insertBatch($categories);
    }
}
