<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('promotions', function (Blueprint $table) {
            $table->bigIncrements('promotion_id');
            $table->integer('officer_id');
            $table->date('date')->default(now());
            $table->integer('hospital_id');
            $table->integer('payment_id');
            $table->string('status');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotions');
    }
}
