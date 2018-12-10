<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AllTableCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
				//
				Schema::create('products', function (Blueprint $table) {
					$table->increments('id');  // 主キー
					$table->string('name');
					$table->integer('price')->default(0);
					$table->string('top_image_url')->nullable();
					$table->string('image_urls')->nullable();
					$table->date('releace_date')->nullable()->default(NOW());
					$table->timestamps();      // created_at と updated_at カラムの作成.
			});
			Schema::create('orders', function(Blueprint $table){
				$table->increments('id');
				$table->string('address_name');
				$table->string('address_zip')->size(8);
				$table->string('address_pref');
				$table->string('address_detail');
				$table->string('address_building')->nullable();
				$table->integer('is_paymented')->default(0);
				$table->date('payment_finish_date')->nullable()->default(NULL);
				$table->timestamps();
			});
			Schema::create('order_contents', function(Blueprint $table){
				$table->increments('id');
				$table->integer('order_id');
				$table->integer('product_id');
				$table->integer('amount');
				$table->timestamps();
			});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
				//
				Schema::dropIfExists('products');
				Schema::dropIfExists('orders');
				Schema::dropIfExists('order_contents');
    }
}
