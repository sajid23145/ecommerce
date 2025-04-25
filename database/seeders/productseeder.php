<?php

namespace Database\Seeders;

use App\Models\product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use faker\Factory as faker;

class productseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=faker::create();
        foreach (range(1,20) as $index) {

            product::insert([
                [
                    'title'=>$faker->title,
                    'description'=>$faker->text(20),
                    'price'=>$faker->numerify(),
                    'image'=>'sf.jpg',
                    'created_at'=>now(),
                    'updated_at'=>now()

                ]
            ]);
        }

    }
}
