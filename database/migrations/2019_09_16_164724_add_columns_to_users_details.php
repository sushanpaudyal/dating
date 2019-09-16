<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToUsersDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_details', function (Blueprint $table) {
            $table->string('body_type')->after('maritial_status');
            $table->string('city')->after('body_type');
            $table->string('state')->after('city');
            $table->string('country')->after('state');
            $table->string('languages')->after('country');
            $table->string('hobbies')->after('languages');
            $table->string('education')->after('hobbies');
            $table->string('occupation')->after('education');
            $table->string('income')->after('occupation');
            $table->string('about_myself')->after('income');
            $table->string('about_partner')->after('about_myself');
            $table->boolean('status')->after('about_partner')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_details', function (Blueprint $table) {
            //
        });
    }
}
