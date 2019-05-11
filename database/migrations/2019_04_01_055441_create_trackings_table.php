<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrackingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trackings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_jo');
            $table->string('no_kendaraan');
            $table->string('supir');
            $table->string('customer');
            $table->string('asal');
            $table->string('tujuan');
            $table->string('no_container');
            $table->string('status');
            $table->string('bop');
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
        Schema::dropIfExists('trackings');
    }
}
