<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('firstname')->nullable()->after('role');
            $table->string('lastname')->nullable()->after('firstname');
            $table->string('image')->nullable()->after('lastname');
            $table->string('company')->nullable()->after('image');
            $table->string('city')->nullable()->after('company');
            $table->string('country')->nullable()->after('city');
            $table->string('imdb_link')->nullable()->after('country');
            $table->string('phone')->nullable()->after('website');
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
            $table->dropColumn('firstname');
            $table->dropColumn('lastname');
            $table->dropColumn('gender');
            $table->dropColumn('company');
            $table->dropColumn('city');
            $table->dropColumn('country');
            $table->dropColumn('website');
            $table->dropColumn('phone');
            $table->dropColumn('phone_add');
        });
    }
}
