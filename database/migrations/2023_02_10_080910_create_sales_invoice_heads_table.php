<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesInvoiceHeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_invoice_heads', function (Blueprint $table) {
            $table->id();
            $table->integer('wis_rrno',)->index();
            $table->dateTime('wis_date');
            $table->string('wis_loc')->nullable();
            $table->string('wis_subcd')->nullable();
            $table->string('wis_trkcd')->nullable();
            $table->string('wis_drvcd')->nullable();
            $table->string('wis_tdso')->nullable();
            $table->string('wis_rem')->nullable();
            $table->string('wis_prep')->nullable();
            $table->string('wis_chkby')->nullable();
            $table->double('wis_dcount', 12, 2)->nullable();
            $table->double('wis_dcnt2', 12, 2)->nullable();
            $table->double('wis_dcnt3', 12, 2)->nullable();
            $table->double('wis_dcnt4', 12, 2)->nullable();
            $table->double('wis_vat', 12, 2)->nullable();
            $table->double('wis_freigh', 12, 2)->nullable();
            $table->double('wis_netamt', 12, 2)->nullable();
            $table->double('wis_dpeso', 12, 2)->nullable();
            $table->boolean('wis_prtflg')->nullable();
            $table->boolean('wis_flg')->nullable();
            $table->integer('wis_batch')->nullable();
            $table->double('wis_cuthds', 12, 2)->nullable();
            $table->double('wis_cutkls', 12, 2)->nullable();
            $table->string('wis_truck')->nullable();
            $table->string('gl_stat')->nullable();
            $table->boolean('wis_canflg')->nullable();
            $table->boolean('wis_pup')->nullable();
            $table->integer('wis_smcode')->nullable();
            $table->integer('wis_sonum')->nullable();
            $table->string('wis_paymd')->nullable();
            $table->string('wis_cur')->nullable();
            $table->double('wis_dcnpr1', 12, 2)->nullable();
            $table->double('wis_dcnpr2', 12, 2)->nullable();
            $table->double('wis_dcnpr3', 12, 2)->nullable();
            $table->double('wis_dcnpr4', 12, 2)->nullable();
            $table->integer('wis_payno')->nullable();
            $table->dateTime('wis_dtime');
            $table->string('pay_bcode')->nullable();
            $table->string('wis_cat')->nullable();
            $table->string('wis_filenm')->nullable();
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
        Schema::dropIfExists('sales_invoice_heads');
    }
}
