<?php
use App\Plan;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            // Columns
            $table->increments('id');
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->decimal('price')->default('0.00');
            $table->string('price_id')->nullable();
            $table->decimal('signup_fee')->default('0.00');
            $table->smallInteger('trial_period')->unsigned()->default(0);
            $table->string('trial_interval')->default('day')->nullable();
            $table->smallInteger('invoice_period')->unsigned()->default(0);
            $table->string('invoice_interval')->default('month');
            $table->smallInteger('grace_period')->unsigned()->default(0);
            $table->string('grace_interval')->default('day')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Plan::create([
            'name' => 'Free Plan',
            'description' => 'This is a Free Plan',
            'price' => 0,
            'price_id' => sha1(md5('free_plan')),
            'signup_fee' => 0,
            'trial_period' => 10,
            'invoice_period' => 1,
            'grace_period' => 30,
        ]);

        Plan::create([
            'name' => 'Gold Plan',
            'description' => 'This is a Gold Plan',
            'price' => 9.99,
            'price_id' => sha1(md5('gold_plan')),
            'signup_fee' => 1,
            'trial_period' => 10,
            'invoice_period' => 1,
            'grace_period' => 30,
        ]);

        Plan::create([
            'name' => 'Silver Plan',
            'description' => 'This is a Silver Plan',
            'price' => 9.99,
            'price_id' => sha1(md5('silver_plan')),
            'signup_fee' => 1,
            'trial_period' => 10,
            'invoice_period' => 1,
            'grace_period' => 30,
        ]);

        Plan::create([
            'name' => 'Platinum Plan',
            'description' => 'This is a Platinum Plan',
            'price' => 9.99,
            'price_id' => sha1(md5('platinum_plan')),
            'signup_fee' => 1,
            'trial_period' => 10,
            'invoice_period' => 1,
            'grace_period' => 30,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }

    /**
     * Get jsonable column data type.
     *
     * @return string
     */
}
