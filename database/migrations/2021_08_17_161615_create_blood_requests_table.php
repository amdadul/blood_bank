<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->text('details');
            $table->unsignedBigInteger('union_id');
            $table->foreign('union_id')->references('id')->on('unions');
            $table->string('hospital_name')->nullable();
            $table->tinyInteger('relations_id');
            $table->string('mobile_no');
            $table->string('alt_mobile_no')->nullable();
            $table->date('donation_date');
            $table->time('time_frame')->nullable();
            $table->tinyInteger('blood_group_id');
            $table->boolean('emergency');
            $table->boolean('managed');
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
        Schema::dropIfExists('blood_requests');
    }
}
