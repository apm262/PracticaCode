<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Festivals extends Seeder
{
    public function run()
    {
        $this->db->table('festivals')->where("id > ", 0)->delete();

        $this->db->query("ALTER TABLE festivals AUTO_INCREMENT=1");

        $festivalsBuilder = Factory::create();

        $festivals = [];

        for($i =1; $i<=20; $i++){
            $festivals[] = [
                'name' => $faker->name,
                'email' => $faker->email,
                'date' => $faker->date,
                'address' => $faker->address,
                'price' => $faker->price,
                'image_url' => $faker->image_url,
                'category_id' => $faker->category_id
            ];
        }

        $festivalsBuilder->insertBatch($festivals);
    }
}

