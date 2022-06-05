<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPosts extends Migration
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
            'title'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ],
            'image_name' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => '500',
                'null' => false,
            ],
            'content' => [
                'type' => 'BLOB',
                'null' => false,
            ],
            'user_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => false
            ],
            'created_at' => [
                'null' => true,
                'type' => 'DATETIME'
            ],
            'edited_at' => [
              'null' => true,
              'type' => 'DATETIME'
            ],
            'deleted_at'=> [
                'null' => true,
                'type' => 'DATETIME'
            ]
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'users', 'id');
        $this->forge->createTable('posts');
    }

    public function down()
    {
        $this->forge->dropTable('posts');
    }
}
