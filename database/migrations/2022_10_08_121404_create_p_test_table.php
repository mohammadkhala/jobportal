<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_test', function (Blueprint $table) {
            $table->id();
            $table->integer('p_id');
            $table->text('distance');
            $table->text('Right_eye_degree');
            $table->text('left_eye_degree');
            $table->integer('year');
            $table->integer('month');
            $table->integer('day');
             $table->text('report');
             $table->integer('cost');


            $table->string('attach');
            $table->integer('test_id');

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
        Schema::dropIfExists('p_test');
    }
}
