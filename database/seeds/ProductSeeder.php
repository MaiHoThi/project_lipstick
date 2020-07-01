<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0;$i<5;$i++)
        {
       DB::table('products')->insert(
           [
        'name'=>'BITE BEAUTY',
        'image'=>'public/mac-lipglass.jpg',
        'price'=>$faker->numberBetween(100000,500000),
        'sale'=>$faker->numberBetween(10,40),
        'status'=>'Còn hàng',
        'description'=>'Hoàn hảo từ màu sắc, thiết kế cho đến chất son,  tạo nên “phép nhiệm màu” mà mọi bạn gái đã mong chờ, đợi ngóng suốt bao lâu nay. Son đỏ đất, khiến bao nàng ngây ngất.',
        'category_id'=>1,
           

           ]
           );
        }
        for($i=0;$i<5;$i++)
        {
       DB::table('products')->insert(
           [
        'name'=>'BITE BEAUTY',
        'image'=>'public/mac-lipglass-2.jpg',
        'price'=>$faker->numberBetween(100000,500000),
        'sale'=>$faker->numberBetween(10,40),
        'status'=>'Còn hàng',
        'description'=>'Hoàn hảo từ màu sắc, thiết kế cho đến chất son,  tạo nên “phép nhiệm màu” mà mọi bạn gái đã mong chờ, đợi ngóng suốt bao lâu nay. Son đỏ đất, khiến bao nàng ngây ngất.',
        'category_id'=>2,
           

           ]
           );
        }
        for($i=0;$i<5;$i++)
        {
       DB::table('products')->insert(
           [
        'name'=>'BITE BEAUTY',
        'image'=>'public/mac-lipglass-6.jpg',
        'price'=>$faker->numberBetween(100000,500000),
        'sale'=>$faker->numberBetween(10,40),
        'status'=>'Còn hàng',
        'description'=>'Hoàn hảo từ màu sắc, thiết kế cho đến chất son,  tạo nên “phép nhiệm màu” mà mọi bạn gái đã mong chờ, đợi ngóng suốt bao lâu nay. Son đỏ đất, khiến bao nàng ngây ngất.',
        'category_id'=>3,
           

           ]
           );
        }
    }
}
