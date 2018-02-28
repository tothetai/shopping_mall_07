<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data=[
        	[
        		'email'=>'admin@gmail.com',
        		'name'=>'admin',
        		'password'=>bcrypt('123456'),
        		'role'=>1
        	],
        	[
        		'email'=>'tothetai@gmail.com',
        		'name'=>'tothetai',
        		'password'=>bcrypt('123456'),
        		'role'=>1
        	],
        	[
        		'email'=>'nguyenthihoai@gmail.com',
        		'name'=>'nguyenthihoai',
        		'password'=>bcrypt('123456'),
        		'role'=>1
        	],
        ];
        DB::table('user_table')->insert($data);
    }
}
