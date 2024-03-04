<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SentQuotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sent_quotes', function (Blueprint $table) {
            $table->id();
            $table->string('mail_subject')->nullable();
            $table->string('email')->nullable();
            $table->string('name')->nullable();
            $table->string('quote_id')->nullable();
            $table->string('players')->nullable();
            $table->string('date')->nullable();
            $table->string('day_of_week')->nullable();
            $table->string('time')->nullable();
            $table->string('age')->nullable();
            $table->string('telephone')->nullable();
            $table->string('location')->nullable();
            $table->string('duration')->comment('duration/options')->nullable();
            $table->string('activities')->nullable();
            $table->bigInteger('ref_number')->nullable();
            $table->longText('message')->nullable();
            $table->string('game_selection')->nullable();
            $table->string('total_cost')->nullable();
            $table->string('per_person_cost')->nullable();
            $table->string('deposit_fee')->nullable();
            $table->longText('event_type')->nullable();
            $table->string('duedate')->nullable();
            $table->integer('remaining_option')->nullable();
            $table->boolean('is_sent')->default(0);
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
        Schema::dropIfExists('sent_quotes');
    }
}
