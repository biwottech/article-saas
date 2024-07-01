<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Competetion;

class CreateCompetetionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competetions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->default('Name');
            $table->string('status')->nullable()->default('INITIALIZING');
            $table->date('starting_date')->nullable();
            $table->date('ending_date')->nullable();
            $table->longText('description')->nullable();
            $table->longText('guide_lines')->nullable();
            $table->date('ended_at')->nullable();
            $table->string('result_status')->nullable();
            $table->string('result_visibility')->nullable();
            $table->longText('result_description')->nullable();
            $table->date('result_announcing_date')->nullable();
            $table->timestamps();
        });

        for ($i=1; $i < 4; $i++) { 
            Competetion::create([
                'name' => 'Competetion'.$i,
                'status' => 'INITIALIZING',
                'starting_date' => '2021-6-'.mt_rand(1,23),
                'ending_date' => '2021-'.mt_rand(7,10).'-'.mt_rand(1,27),
            ]);
        }


        for ($i=1; $i < 4; $i++) { 
            Competetion::create([
                'name' => 'Competetion'.$i,
                'status' => 'STARTED',
                'starting_date' => date('Y-m-d'),
                'ending_date' => '2021-'.mt_rand(7,10).'-'.mt_rand(1,27),
            ]);
        }

        for ($i=1; $i < 4; $i++) { 
            Competetion::create([
                'name' => 'Competetion'.$i,
                'status' => 'PAUSED',
                'starting_date' => '2021-5-'.mt_rand(1,23),
                'ending_date' => '2021-'.mt_rand(7,10).'-'.mt_rand(1,27),
            ]);
        }

        for ($i=1; $i < 4; $i++) { 
            Competetion::create([
                'name' => 'Competetion'.$i,
                'status' => 'ENDED',
                'starting_date' => '2021-5-'.mt_rand(1,23),
                'ending_date' => '2021-'.mt_rand(6,8).'-'.mt_rand(1,27),
                'ended_at' => '2021-'.mt_rand(7,10).'-'.mt_rand(1,27),
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
        Schema::dropIfExists('competetion');
    }
}
