<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
				//
				DB::table('products')->insert([
					'name' => 'ORIGINAL T SHIRT',
					'price' => '3500',
					'top_image_url' => 'https://ssl.emdc.jp/runtime/shopping/img_goods/goods1540080227839851.jpg',
					'image_urls' => '',
					'releace_date' => NOW()
				]);
				DB::table('products')->insert([
					'name' => 'ORIGINAL ZIP PARKER',
					'price' => '5000',
					'top_image_url' => 'https://ssl.emdc.jp/runtime/shopping/img_goods/goods1540088541806921.jpg',
					'image_urls' => '',
					'releace_date' => NOW()
				]);
		}
}
