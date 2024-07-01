<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\AgeGroup;

class CreateAgeGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('age_group', function (Blueprint $table) {
            $table->id();
            $table->string('group_from')->nullable();
            $table->string('group_to')->nullable();
            $table->mediumText('description')->nullable();
            $table->timestamps();
        });

        AgeGroup::create([
            'group_from' => '8',
            'group_to' => '10',
            'description' => '8-10 Years',
        ]);

        AgeGroup::create([
            'group_from' => '10',
            'group_to' => '12',
            'description' => '10-12 Years',
        ]);

        AgeGroup::create([
            'group_from' => '12',
            'group_to' => '14',
            'description' => '12-14 Years',
        ]);

        AgeGroup::create([
            'group_from' => '14',
            'group_to' => '16',
            'description' => '14-16 Years',
        ]);

        AgeGroup::create([
            'group_from' => '16',
            'group_to' => '18',
            'description' => '16-18 Years',
        ]);

        AgeGroup::create([
            'group_from' => '18',
            'group_to' => '20',
            'description' => '18-20 Years',
        ]);


        AgeGroup::create([
            'group_from' => '20',
            'group_to' => '100',
            'description' => '20-100 Years',
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('age_group');
    }
}
