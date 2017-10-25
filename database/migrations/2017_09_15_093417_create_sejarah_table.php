<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSejarahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sejarah', function (Blueprint $table) {
            $table->increments('sj_id');
            $table->integer('ks_id')->unsigned();
            $table->string('sj_nama');
            $table->string('sj_alamat');
            $table->text('sj_deskripsi');
            $table->string('sj_lat');
            $table->string('sj_lng');
            $table->string('sj_youtube');
            $table->string('sj_gambar');            
        });

        Schema::table('sejarah', function (Blueprint $table) {
            $table->foreign('ks_id')->references('ks_id')->on('kategori_sejarah')->onDelete('cascade')->onUpdate('cascade');          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sejarah');
    }
}
