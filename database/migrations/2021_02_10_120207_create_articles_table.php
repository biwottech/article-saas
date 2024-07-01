<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Article;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('plan_id')->unsigned()->nullable();
            $table->foreign('plan_id')->references('id')->on('plans');

            $table->unsignedBigInteger('views')->nullable()->default(0);
            $table->string('status')->nullable()->default('ACTIVE');
            $table->string('visibility')->nullable()->default('PUBLISHED');

            $table->longText('title')->unique()->nullable();
            $table->longText('content')->unique()->nullable();
            $table->mediumText('feature_image')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // for ($user=2; $user < 901; $user++) { 
        //     for ($articles=1; $articles < mt_rand(21,101); $articles++) { 
        //         Article::create([
        //         'user_id' => $user,
        //         'views' => mt_rand(100,10000000000),
        //         'title' => 'When creating a rating you can specify whether'.mt_rand(10000,10000000000).$user,
        //         'content'=> 'When creating a rating you can specify whether the rating is approved or not by adding approved to the array. This is optional and if left out the default is not approved to allow for review before posting'.mt_rand(10000,10000000000).$user,
        //         'feature_image' => 'Washington.jpg',
        //         ]);
        //     }
        // }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
