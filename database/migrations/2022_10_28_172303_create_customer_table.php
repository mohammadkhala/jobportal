<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            // $table->id();
            // $table->unsignedBigInteger('personal_id')->primary();
  $table->unsignedBigInteger('personal_id')->primary();
            $table->string('name');

            $table->date('start_date');
            $table->string('phone');
            $table->string('address');
            $table->text('note')->nullable();
            $table->string('gender');
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
        Schema::dropIfExists('customers');
    }
}
