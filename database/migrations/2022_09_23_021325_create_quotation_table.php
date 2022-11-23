<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation', function (Blueprint $table) {
            // Schema::dropIfExists('quotation');
            $table->id('id_quo');
            $table->string('no_qt');
            $table->string('qty');
            $table->string('total');
            $table->string('status');
            $table->string('pembuat');
            $table->unsignedBigInteger('pelanggan_id')->nullable();
            $table->foreign('pelanggan_id')->references('id_pelanggan')->on('pelanggan_tabel');
            $table->unsignedBigInteger('produk_id')->nullable();
            $table->foreign('produk_id')->references('id_produk')->on('produk');
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
        Schema::dropIfExists('quotation');
    }
}
