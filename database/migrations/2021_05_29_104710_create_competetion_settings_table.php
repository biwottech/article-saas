<?php

use App\CompetetionSetting;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetetionSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competetion_settings', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('competetions_id')->nullable();
            $table->foreign('competetions_id')->references('id')->on('competetions')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedInteger('reading_quantity')->default(10)->nullable();

            $table->unsignedInteger('submit_quantity')->default(10)->nullable();

            $table->unsignedInteger('rating_quantity')->default(5)->nullable();

            $table->string('can_submit_after_initializing')->default('true')->nullable();

            $table->string('can_submit_after_started')->default('true')->nullable();

            $table->string('can_submit_after_paused')->default('true')->nullable();

            $table->string('can_update_after_joined')->default('true')->nullable();
          
            $table->timestamps();
        });

    for ($competetion=1; $competetion < 13; $competetion++) { 
        CompetetionSetting::create([
            'competetions_id' => $competetion,
            'reading_quantity' => mt_rand(5,10),
            'submit_quantity' => mt_rand(5,10),
            'rating_quantity' => mt_rand(5,10),
        ]);
    }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('competetion_settings');
    }
}
