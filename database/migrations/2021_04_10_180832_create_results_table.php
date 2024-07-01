<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('competetions_id')->nullable();
            $table->foreign('competetions_id')->references('id')->on('competetions')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('article_id')->nullable();
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('age_group_id')->nullable();
            $table->foreign('age_group_id')->references('id')->on('age_group')->onDelete('cascade')->onUpdate('cascade');


            $table->string('position')->nullable();

            $table->string('prize')->nullable();

            $table->boolean('claim_prize')->nullable();

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
        Schema::dropIfExists('results');
    }
}
