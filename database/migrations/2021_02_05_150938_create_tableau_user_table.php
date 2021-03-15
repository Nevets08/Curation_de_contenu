<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableauUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('tableau_user', function (Blueprint $table) {
        $table->foreignId('tableau_id');
        $table->foreignId('user_id');
        $table->primary(['tableau_id', 'user_id']);
        $table->foreign('tableau_id')->references('id')->on('tableaux')->cascadeOnDelete()->cascadeOnUpdate();
        $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
        $table->boolean('contributeur')->default(0);
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tableau_user');
    }
}
