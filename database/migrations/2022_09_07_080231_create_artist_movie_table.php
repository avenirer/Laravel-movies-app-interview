<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Am creat artist_movie, pentru a fi conform cu normele Laravel; daca as fi numit tabela 'movie_artist' ar fi trebuit sa setez asta pe modelele implicate
        Schema::create('artist_movie', function (Blueprint $table) {
            

            $table->foreignId('artist_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();

            // old way
            //$table->integer('artist_id')->index();
            //$table->foreign('artist_id')->references('id')->on('artists')->onDelete('cascade');
            
            $table->foreignId('movie_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();

            // old way
            //$table->integer('movie_id')->index();
            //$table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artist_movie');
    }
};
