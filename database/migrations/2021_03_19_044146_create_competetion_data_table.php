<?php

use App\Article;
use App\CompetetionData;
use App\Http\Helpers\Writer\Writer;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetetionDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competetion_data', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('competetions_id')->nullable();
            $table->foreign('competetions_id')->references('id')->on('competetions')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            
            $table->integer('subscription_id')->unsigned()->nullable();
            $table->foreign('subscription_id')->references('id')->on('plans');

            $table->unsignedBigInteger('article_id')->nullable();
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });

        // for ($competetion=1; $competetion < 13; $competetion++) { 
        //     for ($student=2; $student < 5001; $student++) { 
        //         if ($subscription = Writer::hasAnySubscription($student)) {
        //         $needtosubmit = Competetion::ParticipantCanSubmitMaximum($student);
        //                 $articles = Article::where('user_id',$student)->take(mt_rand(1,$needtosubmit))->get();
        //                 foreach ($articles as $article) {
        //                     CompetetionData::create([
        //                     'competetions_id' => $competetion,
        //                     'user_id' => $student,
        //                     'article_id' => $article->id,
        //                     ]);
        //                 }

        //         }
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
        Schema::dropIfExists('competetion_date');
    }
}
