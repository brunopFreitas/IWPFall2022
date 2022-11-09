<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language_person', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id');
            $table->foreignId('language_id');
            $table->timestamps();

            $table->foreign('person_id')->references('id')->on('people');
            $table->foreign('language_id')->references('id')->on('languages');

            $table->unique(['person_id', 'language_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('language_person');
    }
};
