<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $product_name = array('', 'Apple', 'Banana', 'Orange', 'Red Tshirt', 'Blue Tshirt', 'Maong Pants', 'Jogging Pants', 'Barbie Doll', 'Pokemon Plushie');
        $categories = array('Foods', 'Clothes', 'Toys');
        $decsriptions = array("Lorem ipsum dolor sit amet", "consectetur adipiscing elit", "sed do eiusmod tempor incididunt ut labore et dolore magna aliqua");
        $imageReference = array('images/default.png');
        $currentDate = now();
        $categoryIndex = 0;
        for ($x = 1; $x < 10; $x++) {
            if ($x % 4 == 0) {
                $categoryIndex++;
            }

            $z = random_int(0, 2);
            Product::create([
                'name' =>  $product_name[$x],
                'category' => $categories[$categoryIndex],
                'description' => $decsriptions[$z],
                'datetime' =>  $currentDate,
                'images' => json_encode($imageReference),
            ]);
        }
    }
}
