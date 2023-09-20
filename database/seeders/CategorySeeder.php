<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert($this->getData());
    }
    public function getData(): array
    {
        return
        [
            [
                'title' => 'Спорт',
                'description' => 'Новости о спорте',
                'created_at' => now()
            ],
            [
                'title' => 'Развлечения',
                'description' => 'Новости о разных развлечениях',
                'created_at' => now()
            ],
            [
                'title' => 'Политика',
                'description' => 'Новости о политике',
                'created_at' => now()
            ],
            [
                'title' => 'Искусство',
                'description' => 'Новости об искусстве',
                'created_at' => now()
            ],
            [
                'title' => 'ЧП',
                'description' => 'Новости о чрезвычайных происшествиях',
                'created_at' => now()
            ]

        ];
    }
}
