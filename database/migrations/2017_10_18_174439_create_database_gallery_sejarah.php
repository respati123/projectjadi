<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatabaseGallerySejarah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_sejarah', function(Blueprint $table){

            $table->increments('gs_id');
            $table->integer('sj_id')->unsigned();
            $table->string('gs_gambar');


        });

        Schema::table('gallery_sejarah', function(Blueprint $table){

            $table->foreign('sj_id')->references('sj_id')->on('sejarah')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('gallery_sejarah');
    }
}
