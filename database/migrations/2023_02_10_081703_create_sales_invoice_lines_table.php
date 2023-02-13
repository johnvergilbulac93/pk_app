<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesInvoiceLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_invoice_lines', function (Blueprint $table) {
            $table->id();
            $table->integer('wid_rrno')->index();
            $table->dateTime('wid_date');
            $table->string('wid_itemcd');
            $table->double('wid_qty', 12, 2);
            $table->double('wid_untcst', 12, 2);
            $table->string('wid_untms');
            $table->integer('wid_itemno');
            $table->double('wid_dcount', 12, 2);
            $table->double('wid_netamt', 12, 2);
            $table->double('wid_kls', 12, 2);
            $table->boolean('wid_canflg')->nullable();
            $table->integer('wid_batch')->nullable();
            $table->string('wid_remark');
            $table->double('wid_kls2', 12, 2)->nullable();
            $table->string('wid_dtype');
            $table->double('wid_amt', 12, 2)->nullable();
            $table->double('wid_kls3', 12, 2)->nullable();
            $table->double('wid_qty3', 12, 2)->nullable();
            $table->double('wid_totqty', 12, 2)->nullable();
            $table->string('wid_cur')->nullable();
            $table->double('wid_qty2', 12, 2)->nullable();
            $table->boolean('wid_actflg')->nullable();
            $table->dateTime('wid_dt');
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
        Schema::dropIfExists('sales_invoice_lines');
    }
}
