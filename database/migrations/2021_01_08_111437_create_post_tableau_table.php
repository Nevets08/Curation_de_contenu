<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTableauTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tableau', function (Blueprint $table) {
            $table->foreignId('post_id');
            $table->foreignId('tableau_id');
            $table->primary(['post_id', 'tableau_id']);
            $table->foreign('post_id')->references('id')->on('posts')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('tableau_id')->references('id')->on('tableaux')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_tableau');
    }
}
