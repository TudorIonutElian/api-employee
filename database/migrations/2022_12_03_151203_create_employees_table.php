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
        Schema::create('employees', function (Blueprint $table) {
            $table->id('e_id');
            $table->string('e_first_name', 150);
            $table->string('e_last_name', 150);
            $table->date('e_dob');
            $table->string('e_identity', 13);
            $table->unsignedBigInteger('e_city_id')->nullable();
            $table->unsignedBigInteger('e_region_id')->nullable();
            $table->unsignedBigInteger('e_company_id')->nullable();
            $table->unsignedBigInteger('e_function_id')->nullable();
            $table->unsignedBigInteger('e_salary_id')->nullable();
            $table->unsignedBigInteger('e_created_by_id');

            $table->foreign('e_created_by_id')
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
        Schema::dropIfExists('employees');
    }
};
