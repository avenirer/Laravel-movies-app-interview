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
        Schema::create('artists', function (Blueprint $table) {

            $table->id();
            
            $table->tinyText('name');
            $table->tinyText('title');
            
            $table->timestamps();
            // in cerinta apare "delete_at" ca denumire a campului, poate ar fi trebuit sa fie "deleted_at"
            $table->softDeletes('delete_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artists');
    }
};
