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
        Schema::create('movies', function (Blueprint $table) {

            $table->id();
            
            $table->tinyInteger('status', false, true)->default(1);
            $table->tinyText('name');
            $table->decimal('rating', 10, 2, true);
            $table->text('description');
            $table->string('image');            
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
        Schema::dropIfExists('movies');
    }
};
