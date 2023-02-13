<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('cus_code')->index();
            $table->string('cus_name');
            $table->string('cus_cstat')->nullable();
            $table->string('cus_address')->nullable();
            $table->string('cus_prccd')->nullable();
            $table->string('cus_gl_code')->nullable();
            $table->string('cus_navcd')->nullable();
            $table->boolean('cus_type')->nullable()->default(true);
            $table->integer('cus_ext')->nullable();
            $table->string('cus_prccs')->nullable();
            $table->double('cus_conamt', 12, 2)->nullable();
            $table->boolean('cus_mem')->nullable()->default(false);
            $table->boolean('cus_block')->nullable()->default(false);
            $table->string('cus_paytrm')->nullable();
            $table->integer('cus_trade')->nullable();
            $table->string('cus_cur')->nullable();
            $table->boolean('cus_wtchls')->nullable()->default(false);
            $table->double('cus_credlimit', 12, 2)->nullable();
            $table->boolean('cus_shrink')->nullable()->default(false);
            $table->string('cus_ctype')->nullable();
            $table->double('cus_crdtl', 12, 2)->nullable();
            $table->string('cus_gpos')->nullable();
            $table->string('cus_vpos')->nullable();
            $table->string('cus_cpos')->nullable();
            $table->integer('cus_mcode')->nullable();
            $table->boolean('cus_pcs')->nullable()->default(false);
            $table->boolean('cus_walk')->nullable()->default(false);
            $table->integer('cus_ewht')->nullable();
            $table->boolean('cus_export')->nullable()->default(false);
            $table->boolean('cus_panel')->nullable()->default(false);
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
