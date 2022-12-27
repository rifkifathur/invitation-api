<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->string('fullname_man');
            $table->string('callname_man');
            $table->string('fathername_man');
            $table->string('mothername_man');
            $table->string('fullname_woman');
            $table->string('callname_woman');
            $table->string('fathername_woman');
            $table->string('mothername_woman');
            $table->string('akad_date');
            $table->string('akad_address');
            $table->string('resepsi_date');
            $table->string('resepsi_address');
            $table->string('path');
            $table->string('theme_id');
            $table->string('couple_img');
            $table->string('man_img');
            $table->string('woman_img');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
    }
}
