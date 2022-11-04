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
        Schema::create('p_tests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers');            
            $table->integer('distance');
            $table->integer('right_eye_degree');
            $table->integer('left_eye_degree');
            $table->date('date');
            // $table->integer('month');
            // $table->integer('day');
            $table->text('report')->nullable();
            $table->integer('cost');
            $table->string('attach')->nullable();
            $table->unsignedBigInteger('test_id');
            $table->foreign('test_id')->references('id')->on('tests');
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
        Schema::dropIfExists('p_tests');
    }
};
