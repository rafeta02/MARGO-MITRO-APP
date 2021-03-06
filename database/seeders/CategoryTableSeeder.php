<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cats = [
            [
                'name'  => 'BUKU',
                'slug'  => SlugService::createSlug(Category::class, 'slug', 'BUKU'),
            ],
            [
                'name'  => 'BAHAN',
                'slug'  => SlugService::createSlug(Category::class, 'slug', 'BAHAN'),
            ]
        ];
        $subcats = [
            [
                'name'  => 'SD K13',
                'slug'  => SlugService::createSlug(Category::class, 'slug', 'SD K13'),
                'type'  => 'jenjang',
                'parent_id' => 1,
            ],
            [
                'name'  => 'MI K13',
                'slug'  => SlugService::createSlug(Category::class, 'slug', 'MI K13'),
                'type'  => 'jenjang',
                'parent_id' => 1,
            ],
            [
                'name'  => 'SMP K13',
                'slug'  => SlugService::createSlug(Category::class, 'slug', 'SMP K13'),
                'type'  => 'jenjang',
                'parent_id' => 1,
            ],
            [
                'name'  => 'MTS K13',
                'slug'  => SlugService::createSlug(Category::class, 'slug', 'MTS K13'),
                'type'  => 'jenjang',
                'parent_id' => 1,
            ],
            [
                'name'  => 'SMA K13',
                'slug'  => SlugService::createSlug(Category::class, 'slug', 'SMA K13'),
                'type'  => 'jenjang',
                'parent_id' => 1,
            ],
            [
                'name'  => 'SMK K13',
                'slug'  => SlugService::createSlug(Category::class, 'slug', 'SMK K13'),
                'type'  => 'jenjang',
                'parent_id' => 1,
            ],
            [
                'name'  => '1',
                'slug'  => SlugService::createSlug(Category::class, 'slug', '1'),
                'type'  => 'kelas',
                'parent_id' => 1,
            ],
            [
                'name'  => '2',
                'slug'  => SlugService::createSlug(Category::class, 'slug', '2'),
                'type'  => 'kelas',
                'parent_id' => 1,
            ],
            [
                'name'  => '3',
                'slug'  => SlugService::createSlug(Category::class, 'slug', '3'),
                'type'  => 'kelas',
                'parent_id' => 1,
            ],
            [
                'name'  => '4',
                'slug'  => SlugService::createSlug(Category::class, 'slug', '4'),
                'type'  => 'kelas',
                'parent_id' => 1,
            ],
            [
                'name'  => '5',
                'slug'  => SlugService::createSlug(Category::class, 'slug', '5'),
                'type'  => 'kelas',
                'parent_id' => 1,
            ],
            [
                'name'  => '6',
                'slug'  => SlugService::createSlug(Category::class, 'slug', '6'),
                'type'  => 'kelas',
                'parent_id' => 1,
            ],
            [
                'name'  => '64',
                'slug'  => SlugService::createSlug(Category::class, 'slug', '64'),
                'type'  => 'halaman',
                'parent_id' => 1,
            ],
            [
                'name'  => '96',
                'slug'  => SlugService::createSlug(Category::class, 'slug', '96'),
                'type'  => 'halaman',
                'parent_id' => 1,
            ],
            [
                'name'  => 'KERTAS',
                'slug'  => SlugService::createSlug(Category::class, 'slug', 'KERTAS'),
                'type'  => 'bahan',
                'parent_id' => 2,
            ],
            [
                'name'  => 'PLATE',
                'slug'  => SlugService::createSlug(Category::class, 'slug', 'PLATE'),
                'type'  => 'bahan',
                'parent_id' => 2,
            ],
            [
                'name'  => 'CHECMICAL FLUID',
                'slug'  => SlugService::createSlug(Category::class, 'slug', 'CHECMICAL FLUID'),
                'type'  => 'bahan',
                'parent_id' => 2,
            ],
        ];

        Category::insert($cats);
        Category::insert($subcats);
    }
}
