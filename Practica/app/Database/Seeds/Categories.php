<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Categories extends Seeder
{
    public function run()
    {
        $this->db->table('categories')->where("id > ", 0)->delete();

        $this->db->query("ALTER TABLE categories AUTO_INCREMENT=1");

        $categoriesBuilder = Factory::create();

        $categories = [];

        for($i =1; $i<=20; $i++){
            $categories[] = [
                'name' => $faker->name
            ];
        }

        $categoriesBuilder->insertBatch($categories);
    }
}
