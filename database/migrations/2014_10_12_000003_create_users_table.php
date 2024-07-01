<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->mediumText('user_image')->nullable();
            $table->string('email')->unique();

            $table->unsignedBigInteger('age_group_id')->nullable();
            
            $table->foreign('age_group_id')->references('id')->on('age_group')->onDelete('cascade')->onUpdate('cascade');

            $table->date('date_of_birth')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('place_of_birth')->nullable();
        
            
            
            $table->string('country')->nullable();
            $table->longText('address')->nullable();

            $table->mediumText('mother_name')->nullable();
            $table->mediumText('father_name')->nullable();
            
            $table->string('parents_consent')->nullable();
            

            $table->longText('school_name')->nullable();
            $table->string('school_phone')->nullable();
            $table->string('school_email')->nullable();
            $table->longText('school_address')->nullable();

            $table->longText('course')->nullable();

            $table->longText('favourite_educator_name')->nullable();
            $table->string('favourite_educator_phone')->nullable();
            $table->string('favourite_educator_email')->nullable();
            $table->longText('favourite_educator_address')->nullable();

            $table->longText('favourite_institute_name')->nullable();
            $table->string('favourite_institute_phone')->nullable();
            $table->string('favourite_institute_email')->nullable();
            $table->longText('favourite_institute_address')->nullable();
            
            
            $table->string('role')->nullable();
            $table->unsignedInteger('role_id')->default(3);
            $table->enum('type',['Admin','Writer','Reader'])->default('Reader');
            $table->string('sign_up_ip_address')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        User::create([
            'name' => 'Admin',
            'email'=> 'admin@admin.com',
            'phone' => '+00000000000',
            'country' => 'USA',
            'role' => 'Admin',
            'role_id' => 1,
            'type' => 'Admin',
            'password' => bcrypt('password'),
        ]);


        for ($i=1; $i < 21; $i++) { 
        User::create([
            'name' => 'Student'.$i,
            'email'=> 'student'.$i.'@email.com',
            'phone' => '+11111111111'.$i,
            'place_of_birth' => "South Africa",
            "age_group_id" => rand(1,7),
            "date_of_birth" => rand(1980,2005).'-'.rand(1,12).'-'.rand(1,28),
            "country" => "South Africa",
            "address" => "Some Address",
            "mother_name" => "Parents Name",
            "father_name" => "Parents Name",
            "parents_consent" => "yes",

            "school_name" => "Some Data",
            "school_phone" => "Some Data",
            "school_email" => 'student'.$i.'@email.com',
            "school_address" => "Some Address",

            "course" => "Computer Science",

            "favourite_educator_name" => "Some Data",
            "favourite_educator_phone" => "Some Data",
            "favourite_educator_email" => 'student'.$i.'@email.com',
            "favourite_educator_address" => "Some Address",

            "favourite_institute_name" => "Some Data",
            "favourite_institute_phone" => "Some Data",
            "favourite_institute_email" => 'student'.$i.'@email.com',
            "favourite_institute_address" => "Some Address",
            'role' => 'Student',
            'role_id' => 2,
            'type' => 'Writer',
            'sign_up_ip_address' => long2ip(mt_rand()+mt_rand()+mt_rand(0,1)),
            'password' => bcrypt('password'),
        ]);
        }

        for ($i=1; $i < 21; $i++) { 
        User::create([
            'name' => 'Teacher'.$i,
            'email'=> 'Teacher'.$i.'@email.com',
            'phone' => '+33333333333'.$i,
            'country' => 'Australia',
            'address' => 'Australia',
            "school_name" => "Some Data",
            "school_address" => "Some Address",
            'course' => "Computer Science",
            'role' => 'Teacher',
            'role_id' => 3,
            'type' => 'Reader',
            'password' => bcrypt('password'),
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
        Schema::dropIfExists('users');
    }
}
