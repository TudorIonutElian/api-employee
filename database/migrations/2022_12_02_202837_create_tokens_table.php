<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tokens', function (Blueprint $table) {
            $table->id('t_id');
            $table->unsignedBigInteger('t_user_id');
            $table->string('t_token');
            $table->datetime('t_created_at');
            $table->datetime('t_expiring_on')->nullable();
            $table->tinyInteger('t_can_create')->default(0);
            $table->tinyInteger('t_can_read')->default(1);
            $table->tinyInteger('t_can_update')->default(0);
            $table->tinyInteger('t_can_delete')->default(0);

            $table->foreign('t_user_id')->references('u_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tokens');
    }
};
