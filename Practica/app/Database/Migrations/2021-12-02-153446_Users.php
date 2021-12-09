<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
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
            'username' => [
                'type' => 'varchar',
                'constraint' => 255,
                'unique' => true
            ],
            'email' => [
                'type' => 'varchar',
                'constraint' => 255,
                'unique' => true
            ],
            'password' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'name' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'surname' => [
                'type' => 'varchar',
                'constraint' => 255
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
            ],
            'rol_id' => [
                'type'  => 'INT',
                'constraint' => 5
            ]
            ]);
            $this->forge->addPrimaryKey('id');
            $this->forge->addForeignKey('rol_id','roles','id','CASCADE','SET NULL');
            $this->forge->createTable('users');

            $this->db->enableForeignKeyChecks();

    }

    public function down()
    {
        $this->forge>dropTable('users');
    }
}
