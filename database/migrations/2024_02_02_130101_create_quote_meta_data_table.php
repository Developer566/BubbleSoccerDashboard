<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuoteMetaDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quote_meta_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quote_id');
            $table->string('key')->nullable();
            $table->longText('value')->nullable();
            $table->foreign('quote_id')->references('id')->on('quote_data');

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
        Schema::dropIfExists('quote_meta_data');
    }
}
