<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $data[0] = [
            'name' => 'Darth Vader',
            'email'    => 'darth@empire.com',
            'password' => sha1('darth')

        ];
        $data[1] = [
            'name' => 'Luke Skywalker',
            'email'    => 'lukeskywalker@empire.com',
            'password' => sha1('lukeskywalker')

        ];
        foreach($data as $d) {
            $this->db->table('users')->insert($d);
        }
    }
}