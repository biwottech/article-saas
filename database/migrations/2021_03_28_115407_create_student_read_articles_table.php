<?php

use App\Article;
use App\WriterReadArticle;
use App\Http\Helpers\Writer\Writer;
use Illuminate\Support\Facades\Schema;
use App\Http\Helpers\Admin\Competetion;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentReadArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_read_articles', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('competetions_id')->nullable();
            $table->foreign('competetions_id')->references('id')->on('competetions')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('article_id')->nullable();
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('student_read_articles');
    }
}
