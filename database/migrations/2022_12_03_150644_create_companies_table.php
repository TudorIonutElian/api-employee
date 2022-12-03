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
        Schema::create('companies', function (Blueprint $table) {
            $table->id('c_id');
            $table->string('c_name', 255);
            $table->date('c_start_date');
            $table->string('c_act_starting_number');
            $table->tinyInteger('c_is_active')->default(0);
            $table->unsignedBigInteger('c_created_by');
            $table->unsignedBigInteger('c_ceo_id');

            // Add foreign key for user that created the company
            $table->foreign('c_created_by')
                    ->references('u_id')
                    ->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
