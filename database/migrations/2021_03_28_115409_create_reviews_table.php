<?php

use App\User;
use App\Article;
use App\Http\Helpers\Admin\Competetion;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('rating')->nullable();

            $table->unsignedBigInteger('competetions_id')->nullable();
            $table->foreign('competetions_id')->references('id')->on('competetions')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('customer_service_rating')->nullable();
            $table->integer('quality_rating')->nullable();
            $table->integer('friendly_rating')->nullable();
            $table->integer('pricing_rating')->nullable();
            $table->enum('recommend', ['Yes', 'No'])->nullable();
            $table->enum('department', ['Sales', 'Service', 'Parts'])->nullable();
            $table->string('title')->nullable();
            $table->string('body')->nullable();
            $table->boolean('approved')->default(0);
            $table->nullableMorphs('reviewrateable');
            $table->nullableMorphs('author');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
