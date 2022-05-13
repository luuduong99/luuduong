<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMutipleColumnToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('mail_address')->after('name');
            $table->string('address')->after('password');
            $table->string('phone')->after('address');
            $table->dropColumn('email_verified_at');
            $table->dropColumn('remember_token');
            $table->dropColumn('email');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('mail_address', 'address', 'phone');
            $table->dropSoftDeletes();
        });
    }
}
