<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->string('phone_num');
            $table->date('dob');
            $table->string('city');
            $table->integer('num_reviews')->unsigned();
            $table->integer('num_followers')->unsigned();
            $table->integer('num_followings')->unsigned();
            $table->string('prof_pic_link');
            $table->timestamps();

            //foreign keys and onDelete:
            $table->foreign('user_id')->references('id')->on('users')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_profiles');
    }
}
