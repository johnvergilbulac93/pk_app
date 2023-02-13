<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('itm_code')->index()->unique();
            $table->string('itm_desc')->nullable();
            $table->string('itm_umpcs')->nullable();
            $table->double('itm_price',12,2)->nullable();
            $table->double('itm_cost',12,2)->nullable();
            $table->double('itm_inv',12,2)->nullable();
            $table->boolean('itm_vatflg')->nullable()->default(false);
            $table->double('itm_min',12,2)->nullable();
            $table->double('itm_max',12,2)->nullable();
            $table->string('itm_type')->nullable();
            $table->integer('itm_sup')->nullable();
            $table->integer('itm_cat')->nullable();
            $table->integer('itm_scat')->nullable();
            $table->string('itm_mtype')->nullable();
            $table->boolean('itm_block')->nullable()->default(false);
            $table->integer('itm_unttg')->nullable();
            $table->string('itm_navcod')->nullable();
            $table->string('itm_sobloc')->nullable();
            $table->double('itm_lascos',12,2)->nullable();
            $table->string('itm_pitem')->nullable();
            $table->integer('itm_rtrade')->nullable();
            $table->integer('itm_trade')->nullable();
            $table->string('itm_cat2')->nullable();
            $table->string('itm_scat2')->nullable();
            $table->string('itm_rrcod')->nullable();
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
        Schema::dropIfExists('items');
    }
}
