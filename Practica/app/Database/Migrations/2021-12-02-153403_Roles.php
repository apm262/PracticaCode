<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Roles extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'  => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'name' => [
                'type' => 'varchar',
                'constraint' => 100
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
            $this->forge->createTable('roles');

    }

    public function down()
    {
        $this->forge->dropTable('roles');
    }
}
