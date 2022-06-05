<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCategory extends Migration
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
            'category_name'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ],
            'category_description'       => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
                'null' => false
            ],
            'color'       => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null' => false
            ],

        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('category');
    }

    public function down()
    {
        $this->forge->dropTable('category');
    }
}
