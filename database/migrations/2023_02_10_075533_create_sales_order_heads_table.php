<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesOrderHeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_order_heads', function (Blueprint $table) {
            $table->id();
            $table->integer('soh_rrno')->index();
            $table->dateTime('soh_date');
            $table->string('soh_subcd')->nullable();
            $table->string('soh_prep')->nullable();
            $table->string('soh_chckby')->nullable();
            $table->boolean('soh_prtflg')->nullable()->default(false);
            $table->boolean('soh_flg')->nullable()->default(false);
            $table->double('soh_cuthds', 12, 2)->nullable();
            $table->double('soh_cutkls', 12, 2)->nullable();
            $table->boolean('soh_canflg')->nullable()->default(false);
            $table->boolean('soh_pup')->nullable()->default(false);
            $table->integer('soh_smcode')->nullable();
            $table->integer('soh_trade')->nullable();
            $table->string('soh_cur')->nullable();
            $table->string('soh_x')->nullable();
            $table->dateTime('soh_dtime');
            $table->dateTime('soh_transd');
            $table->string('soh_cat')->nullable();
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
        Schema::dropIfExists('sales_order_heads');
    }
}
