<?php
use App\Plan;
use App\Http\Helpers\Writer\Writer;
use Illuminate\Support\Facades\Schema;
use App\Http\Helpers\Admin\Competetion;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('plan_id')->unsigned()->nullable();
            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade')->onUpdate('cascade');

            $table->string('Order_ID')->nullable();
            $table->string('Order_Status')->nullable();
            $table->string('Payer_Given_Name')->nullable();
            $table->string('Payer_Sur_Name')->nullable();
            $table->string('Payer_Email')->nullable();
            $table->string('Payer_ID')->nullable();


            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            
            $table->dateTime('trial_ends_at')->nullable();

            $table->string('trial_status')->nullable();

            $table->dateTime('plan_starts_at')->nullable();

            $table->dateTime('plan_ends_at')->nullable();

            $table->string('plan_status')->nullable();

            $table->string('plan_signup_fee')->nullable();
            $table->string('plan_price')->nullable();

            $table->string('plan_total_charge')->nullable();
            $table->date('Paid_At')->nullable();

            $table->dateTime('plan_canceled_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_subscriptions');
    }

    /**
     * Get jsonable column data type.
     *
     * @return string
     */
}
