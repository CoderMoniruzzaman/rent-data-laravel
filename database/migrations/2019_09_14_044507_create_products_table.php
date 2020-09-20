<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('product_id');
            $table->string('name');
            $table->string('phone');
            $table->string('photograph')->default('defaultphoto.jpg');
            $table->integer('nid');
            $table->string('etin');
            $table->string('occupation');


            $table->string('house_h')->nullable();
            $table->string('road_h')->nullable();
            $table->string('thana_h')->nullable();
            $table->string('city_h')->nullable();
            $table->integer('pcode_h')->nullable();
            $table->string('district_h')->nullable();

            $table->string('house_p')->nullable();
            $table->string('road_p')->nullable();
            $table->string('thana_p')->nullable();
            $table->string('city_p')->nullable();
            $table->integer('pcode_p')->nullable();
            $table->string('district_p')->nullable();

            $table->string('house_pic')->default('defaultpic.jpg');

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
        Schema::dropIfExists('products');
    }
}
