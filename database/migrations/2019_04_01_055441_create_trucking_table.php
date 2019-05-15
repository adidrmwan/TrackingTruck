<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTruckingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trucking', function (Blueprint $table) {
            $table->bigIncrements('id_trucking');
            $table->string('no_jo');
            $table->string('no_kendaraan');
            $table->string('sopir');
            $table->string('customer');
            $table->string('tujuan_dari');
            $table->string('tujuan_ke');
            $table->string('no_container')->nullable();
            $table->string('status_d20')->nullable();
            $table->string('status_d40')->nullable();
            $table->string('jumlah_bop');
            $table->string('tagihan');
            $table->string('revenue');
            $table->string('provit');
            $table->string('ket')->nullable();
            $table->string('status')->nullable();
            $table->date('tanggal');
            $table->integer('entry_user')->nullable();
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
        Schema::dropIfExists('trucking');
    }
}
