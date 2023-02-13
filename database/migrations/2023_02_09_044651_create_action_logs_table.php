<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action_logs', function (Blueprint $table) {
            $table->id();
            $table->string('username', 100);
            $table->foreignUuid('user_id');
            $table->string('action');
            $table->timestamp('attempt_date_time');
            $table->tinyInteger('successful')->nullable();
            $table->timestamp('action_datetime')->nullable();
            $table->uuid('role_id')->nullable();
            $table->string('device', 255)->nullable();
            $table->string('payload')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('action_logs');
    }
}
