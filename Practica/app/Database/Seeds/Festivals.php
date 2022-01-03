<?php

namespace App\Database\Seeds;

use Faker\Factory;
use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class Festivals extends Seeder
{
    public function run()
    {
        $this->db->table('festivals')->where("id > ", 0)->delete();

        $this->db->query("ALTER TABLE festivals AUTO_INCREMENT=1");

        $festivalsBuilder = $this->db->table('festivals');

        $faker = Factory::create();

        $festivals = [];

        for($i =1; $i<=20; $i++){
            $festivals[] = [
                'name' => $faker->name,
                'email' => $faker->email,
                'date' => $faker->Time('now'),
                'address' => $faker->address,
                'price' => "40",
                'image_url' => "url",
                'category_id' => "1",
                'created_at' => Time::createFromTimestamp($faker->unixTime()),
                'updated_at'  => Time::now()
            ];
        }

        $festivalsBuilder->insertBatch($festivals);
    }
}

