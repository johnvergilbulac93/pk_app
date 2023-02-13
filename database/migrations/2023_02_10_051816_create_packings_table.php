<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packings', function (Blueprint $table) {
            $table->id();
            $table->string('pck_itmcd');
            $table->string('pck_pckds')->nullable();
            $table->double('pck_pckpr', 12, 2)->nullable();
            $table->double('pck_pckcst', 12, 2)->nullable();
            $table->double('pck_pckqty', 12, 2)->nullable();
            $table->boolean('pck_block')->nullable()->default(true);
            $table->boolean('pck_status')->nullable()->default(true);
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
        Schema::dropIfExists('packings');
    }
}
