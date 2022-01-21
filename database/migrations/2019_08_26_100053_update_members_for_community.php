<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMembersForCommunity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->timestamp('silence_until')->after('last_login_at')->nullable();
            $table->string('username')->unique()->nullable()->after('seconded_by');
            $table->boolean('admin')->default(false)->after('password');
            $table->boolean('moderator')->default(false)->after('admin');
            $table->unsignedInteger('engagement_rating')->default(40)->after('moderator');
        });
    }
}
