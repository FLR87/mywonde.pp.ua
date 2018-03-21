<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'title' => 'Мировые новости',
                'short_name' => 'worldnews',
            ],
            [
                'title' => 'Новости спорта',
                'short_name' => 'sport',
            ],
            [
                'title' => 'Новости Краматорска',
                'short_name' => 'kramatorsk',
            ],
            [
                'title' => 'Новости экономики',
                'short_name' => 'economics',
            ]
        ];

        Category::insert($data);
    }
}

