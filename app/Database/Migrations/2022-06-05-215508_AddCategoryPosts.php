<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCategoryPosts extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'category_id'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'null' => false
            ],
            'post_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => false
            ]


        ]);

        $this->forge->addForeignKey('category_id', 'category', 'id');
        $this->forge->addForeignKey('post_id', 'posts', 'id');
        $this->forge->createTable('category_posts');

    }

    public function down()
    {

        $this->forge->dropTable('category_posts');
    }
}
