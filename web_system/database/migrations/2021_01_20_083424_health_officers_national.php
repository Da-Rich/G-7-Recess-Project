<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HealthOfficersNational extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_officers_nationals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('officer_name');
            $table->string('role')->default('officer');
            $table->string('district_name')->nullable();
            $table->string('upgrade')->nullable();
            $table->string('award')->default('0');
            $table->boolean('pending')->default(false);
            $table->string('monthly_allowane')->default('0');
            $table->integer('hospital_id')->default(0);
            $table->string('hospital_name');
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
        Schema::dropIfExists('health_officers_nationals');
    }
}
