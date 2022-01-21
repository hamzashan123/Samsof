<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_member', function (Blueprint $table) {
            $table->unsignedBigInteger('hospital_id');
            $table->unsignedBigInteger('member_id');

            $table->foreign('hospital_id')->references('id')->on('hospitals');
            $table->foreign('member_id')->references('id')->on('members');
        });
    }
}
