<?php
use App\PlanFeature;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_features', function (Blueprint $table) {
            // Columns
            $table->increments('id');
            $table->integer('plan_id')->unsigned()->nullable();
            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('competetion_quantity')->default(2)->nullable();
            $table->unsignedInteger('writing_quantity')->default(2)->nullable();
            $table->unsignedInteger('reading_quantity')->default(10)->nullable();
            $table->unsignedInteger('submit_quantity')->default(10)->nullable();
            $table->unsignedInteger('rating_quantity')->default(5)->nullable();
            $table->string('can_update_after_joined')->default('true')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        for ($plan=1; $plan < 5; $plan++) {
            PlanFeature::create([
                'plan_id' => $plan,
                'competetion_quantity' => mt_rand(1,12),
                'writing_quantity' => mt_rand(1,10),
                'reading_quantity' => mt_rand(1,10),
                'submit_quantity' => mt_rand(1,40),
                'rating_quantity' => mt_rand(1,11),
                'can_update_after_joined' => 'false',
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
        Schema::dropIfExists('plan_features');
    }

    /**
     * Get jsonable column data type.
     *
     * @return string
     */
}
