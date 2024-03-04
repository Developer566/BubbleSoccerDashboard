<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuoteDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quote_data', function (Blueprint $table) {
            $table->id();

            $table->string('mail_subject')->nullable();
            $table->string('name')->nullable();

            $table->integer('players')->nullable();
            $table->string('date')->nullable();
            $table->string('day_of_week')->nullable();
            $table->string('time')->nullable();
            $table->string('age')->nullable();
            $table->string('telephone')->nullable();
            $table->string('location')->nullable();
            $table->string('duration')->comment('duration/options')->nullable();
            $table->string('activities')->nullable();
            $table->bigInteger('ref_number')->startingValue(1000)->nullable();


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
        Schema::dropIfExists('quote_data');
    }
}
