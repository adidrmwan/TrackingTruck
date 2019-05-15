<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTruckingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('truckings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_jo');
            $table->string('no_kendaraan');
            $table->string('sopir');
            $table->string('customer');
            $table->string('asal');
            $table->string('tujuan_dari');
            $table->string('tujuan_ke');
            $table->string('no_container');
            $table->string('status_d20');
            $table->string('status_d40');
            $table->string('bop_jumlah');
            $table->string('tagihan');
            $table->string('revenue');
            $table->string('provit');
            $table->string('ket');
            $table->date('tanggal');
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
        Schema::dropIfExists('truckings');
    }
}
