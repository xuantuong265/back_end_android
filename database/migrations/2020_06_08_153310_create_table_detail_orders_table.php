<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDetailOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_detailOrders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_orders');
            $table->integer('id_products');
            $table->string('name_products');
            $table->double('price');
            $table->integer('amounts');
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
        Schema::dropIfExists('tbl_detailOrders');
    }
}
