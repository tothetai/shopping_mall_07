<?php
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class, 5)->create();
        $data=[
        	[
        		'cat_name'=>'Quần Ngố',
        		'cat_slug'=>str_slug('Quần Ngố')
        	],
        	[
        		'cate_name'=>'Áo Vest',
        		'cate_slug'=>str_slug('Áo Vest')
        	],
        	[
        		'cate_name'=>'Quần Âu',
        		'cate_slug'=>str_slug('Quần Âu')
        	],
        	[
        		'cate_name'=>'Áo Phông',
        		'cate_slug'=>str_slug('Áo Phông')
        	],
        	[
        		'cate_name'=>'Áo Khoác',
        		'cate_slug'=>str_slug('Áo Khoác')
        	],
        	[
        		'cate_name'=>'Giày Nam',
        		'cate_slug'=>str_slug('Giày Nam')
        	],
        ];
        DB::table('categories')->insert($data);
    }
}
