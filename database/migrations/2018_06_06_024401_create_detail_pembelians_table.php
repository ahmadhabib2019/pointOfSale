<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDetailPembeliansTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pembelians', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('barang_id')->unsigned();
            $table->integer('pembelian_id')->unsigned();
            $table->integer('qty');
            $table->integer('subtotal');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('barang_id')->references('id')->on('barangs');
            $table->foreign('pembelian_id')->references('id')->on('pembelians');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detail_pembelians');
    }
}
