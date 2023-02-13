<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesOrderLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_order_lines', function (Blueprint $table) {
            $table->id();
            $table->integer('sol_rrno')->index();
            $table->dateTime('sol_date');
            $table->string('sol_itemcd')->nullable();
            $table->double('sol_kls', 12, 3)->nullable();
            $table->double('sol_qty', 12, 3)->nullable();
            $table->double('sol_untcst', 12, 3)->nullable();
            $table->string('sol_untms')->nullable();
            $table->integer('sol_itemno')->nullable();
            $table->double('sol_dcount', 12, 3)->nullable();
            $table->double('sol_netamt', 12, 3)->nullable();
            $table->double('sol_fg', 12, 3)->nullable();
            $table->boolean('sol_canflg')->nullable()->default(false);
            $table->string('sol_cur')->nullable();
            $table->boolean('sol_untflg')->nullable()->default(false);
            $table->dateTime('sol_dtime');
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
        Schema::dropIfExists('sales_order_lines');
    }
}
