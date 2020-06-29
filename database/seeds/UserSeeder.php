<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        
        DB::table('users')->insert([
            [
            
            'email'=>'maiho@gmail.com',
            'password' =>Hash::make('admin'),
            'name'=>$faker->name,
            'birthday'=> $faker->dateTimeBetween('1990-01-01', '2012-12-31'),
            'gender'=>'admin',
            'role'=>'admin',
            
            
        ],
        [
    
            'email'=>'nam@gmail.com',
            'password' =>Hash::make('123'),
            'name'=>$faker->name,
            'birthday'=> $faker->dateTimeBetween('1990-01-01', '2012-12-31'),
            'gender'=>'nam',
            'role'=>'user',
            
        ]
        ]);

   
        
    }
}
