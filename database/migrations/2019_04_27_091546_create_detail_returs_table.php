<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailRetursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_returs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('barang_id')->unsigned();
            $table->integer('retur_id')->unsigned();
            $table->integer('qty');
            $table->integer('subtotal');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('barang_id')->references('id')->on('barangs');
            $table->foreign('retur_id')->references('id')->on('returs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_returs');
    }
}
