<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $data[0] = [
            'category_name' => 'Świat',
            'category_description'    => 'Newsy ze świata, najświeższe',
            'color' => 'is-info'
        ];
        $data[1] = [
            'category_name' => 'Fizyka',
            'category_description'    => 'Fizyka jest królową nauk, przewyższa nawet chemię.',
            'color' => 'is-primary'

        ];
        $data[2] = [
            'category_name' => 'Sport',
            'category_description'    => 'Veni Vidi Vici.',
            'color' => 'is-success'

        ];
        $data[3] = [
            'category_name' => 'Podróże',
            'category_description'    => 'Świat poznawać trzeba.',
            'color' => 'is-warning'

        ];
        $data[4] = [
            'category_name' => 'Filozofia',
            'category_description'    => 'Filozofia filozofią jest.',
            'color' => 'is-light'

        ];
        $data[5] = [
            'category_name' => 'Polityka',
            'category_description'    => 'Polityka w polsce i na świecie.',
            'color' => 'is-danger'

        ];
        $data[6] = [
            'category_name' => 'Jedzenie',
            'category_description'    => 'Jedzenie to jedzenie',
            'color' => 'is-link'

        ];

        foreach($data as $d) {
            $this->db->table('category')->insert($d);
        }



    }
}