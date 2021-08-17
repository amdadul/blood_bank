<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('alt_mobile_no')->nullable();
            $table->unsignedBigInteger('union_id');
            $table->foreign('union_id')->references('id')->on('unions');
            $table->string('address')->nullable();
            $table->tinyInteger('blood_group_id');
            $table->tinyInteger('gender_id');
            $table->tinyInteger('religion_id');
            $table->double('weight');
            $table->date('dob');
            $table->integer('donation_count')->nullable();
            $table->integer('request_count')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donors');
    }
}
