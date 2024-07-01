<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\WebsiteSetting;

class CreateWebsiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_settings', function (Blueprint $table) {
            $table->id();
            $table->string('text_logo')->nullable();
            $table->longText('logo')->nullable();
            $table->longText('address')->nullable();

            $table->string('email_1')->nullable();
            $table->string('phone_1')->nullable();

            $table->string('email_2')->nullable();
            $table->string('phone_2')->nullable();

            $table->string('email_3')->nullable();
            $table->string('phone_3')->nullable();
            
            $table->timestamps();
        });

        WebsiteSetting::create([
            'text_logo' => 'CashTalesChampion',
            'logo' => '1614402883.c4ca4238a0b923820dcc509a6f75849b.png',
            'address' => 'Buttonwood, California.Rosemead, CA 91770',

            'email_1' => 'admin@cashtaleschampion.com',
            'phone_1' => '+00187867675',

            'email_2' => 'admin@cashtaleschampion.com',
            'phone_2' => '+00187867675',

            'email_3' => 'admin@cashtaleschampion.com',
            'phone_3' => '+00187867675',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('website_settings');
    }
}
