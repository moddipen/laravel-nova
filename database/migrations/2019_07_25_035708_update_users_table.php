<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->uuid('uuid');

            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->date('date_of_birth');
            $table->string('phone')->nullable();
            $table->string('identifier')->nullable();

            $table->string('reset_code')->nullable();
            $table->string('image_src')->nullable();

            /*
             * Foreign keys
             */
            $table->bigInteger('gender_id');
            $table->bigInteger('company_id')->nullable();
            $table->bigInteger('country_id');

//            $table->foreign('gender_id')->references('id')->on('genders');
//            $table->foreign('company_id')->references('id')->on('companies');
//            $table->foreign('country_id')->references('id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('middle_name');
            $table->dropColumn('date_of_birth');
            $table->dropColumn('phone');
            $table->dropColumn('identifier');
            $table->dropColumn('image_src');
            $table->dropColumn('reset_code');

            /*
             * Foreign keys
             */
            $table->dropColumn('gender_id');
            $table->dropColumn('company_id');
            $table->dropColumn('country_id');

//            $table->dropForeign('users_gender_id_foreign');
//            $table->dropForeign('users_company_id_foreign');
//            $table->dropForeign('users_country_id_foreign');
        });
    }
}
