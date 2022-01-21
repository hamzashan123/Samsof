<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id('id');
            $table->boolean('active')->default(false);
            $table->string('membership_type')->default('full');
            $table->string('first_name');
            $table->string('last_name');
            $table->datetime('birth')->nullable();
            $table->string('qualifications')->default('[]');
            $table->string('practise_address')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('practice_email')->unique()->nullable();
            $table->string('mobile')->nullable();
            $table->string('telephone')->nullable();
            $table->string('alt_telephone')->nullable();
            $table->string('interests')->default('[]');
            $table->string('nominated_by')->nullable();
            $table->string('seconded_by')->nullable();
            $table->string('password')->nullable();
            $table->timestamp('last_login_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
