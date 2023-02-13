<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdjustmentReasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adjustment_reasons', function (Blueprint $table) {
            $table->id();
            $table->string('adj_name');
            $table->string('adj_dsx')->nullable();
            $table->string('adj_nav')->nullable();
            $table->string('adj_exdsx')->nullable();
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
        Schema::dropIfExists('adjustment_reasons');
    }
}
