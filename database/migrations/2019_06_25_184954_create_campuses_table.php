<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('name');
            $table->string('state');
            $table->string('municipality');
            $table->string('colony')->nullable();
            $table->string('street');
            $table->string('zipcode');
            $table->integer('external_number');
            $table->string('internal_number')->nullable();
            $table->boolean('status')->default(true);
            $table->boolean('university');
            $table->boolean('high_school');
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
        Schema::dropIfExists('campuses');
    }
}
