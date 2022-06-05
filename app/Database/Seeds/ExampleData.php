<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ExampleData extends Seeder
{
    public function run()
    {
       $this->call("UsersSeeder");
       $this->call("PostsSeeder");

    }
}