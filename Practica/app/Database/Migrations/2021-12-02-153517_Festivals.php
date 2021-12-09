<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Festivals extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id' => [
                'type'  => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'name' => [
                'type' => 'varchar',
                'constraint' => 255 
            ],
            'email' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'date' => [
                'type' => 'DATETIME'
            ],
            'price' => [
                'type' => 'DECIMAL',
                'constraint' => 11
            ],
            'address' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'image_url' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'category_id' => [
                'type'  => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'null' => true
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => false
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => false
            ]
            ]);
            $this->forge->addPrimaryKey('id');
            $this->forge->addForeignKey('category_id','categories','id','CASCADE','SET NULL');
            $this->forge->createTable('festivals');

            $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('festivals');
    }
}
