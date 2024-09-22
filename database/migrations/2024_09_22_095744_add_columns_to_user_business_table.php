<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUserBusinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_business', function (Blueprint $table) {

            $table->string('business_name')->nullable();
            $table->string('phoneNumber')->nullable();
            $table->string('businessShortCode')->nullable();
            $table->string('tinNumber')->nullable();
            $table->string('contactPerson')->nullable();
            $table->dateTime('createdDate')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_business', function (Blueprint $table) {
            $table->dropColumn(['business_name', 'phoneNumber', 'businessShortCode', 'tinNumber', 'contactPerson', 'createdDate']);

        });
    }
}
