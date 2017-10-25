<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriPenggunaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histori_pengguna', function (Blueprint $table) {
            $table->increments('hp_id');
            $table->integer('us_id')->unsigned();
            $table->text('hp_deskripsi');
            $table->timestamps();        
        });

        Schema::table('histori_pengguna', function (Blueprint $table) {
            $table->foreign('us_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('histori_pengguna');
    }
}
