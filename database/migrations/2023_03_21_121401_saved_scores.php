<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    public function up(): void
    {
        Schema::create('saved_scores', function (Blueprint $table) {
//          type list: https://laravel.com/docs/5.0/schema
            $table->increments('id');
            $table->string('Name');
//            $table->json('data');
            $table->double('Quiz');
            $table->double('Tugas');
            $table->double('Absensi');
            $table->double('Praktek');
            $table->double('UAS');
            $table->double('Final_Score');
            $table->string('Grade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saved_scores');
    }

};
