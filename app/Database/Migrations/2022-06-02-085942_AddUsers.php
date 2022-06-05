<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUsers extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
                'null' => false
            ],
            'name'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
            ],

        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}