<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->integer('sup_code')->index();
            $table->string('sup_name');
            $table->string('sup_address')->nullable();
            $table->string('sup_type')->nullable();
            $table->string('sup_pay')->nullable();
            $table->boolean('sup_block')->nullable()->default(false);
            $table->string('sup_gl_code')->nullable();
            $table->string('sup_nav_code')->nullable();
            $table->boolean('sup_stat')->nullable()->default(false);
            $table->double('sup_conamt', 12, 2)->nullable();
            $table->string('sup_cur')->nullable();
            $table->integer('sup_trade')->nullable();
            $table->string('sup_pcode')->nullable();
            $table->integer('sup_ext')->nullable();
            $table->string('sup_cpos')->nullable();
            $table->string('sup_vpos')->nullable();
            $table->string('sup_spos')->nullable();
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
        Schema::dropIfExists('suppliers');
    }
}
