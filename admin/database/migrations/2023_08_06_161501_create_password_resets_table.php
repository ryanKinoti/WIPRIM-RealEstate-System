<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('password_resets', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned();
            $table->string('email')->primary();
            $table->string('token');
            $table->enum('reset_type', ['account_creation', 'normal_reset'])->default('account_creation');
            $table->enum('token_used', ['true', 'false'])->default('false');
            $table->timestamp('created_at')->nullable();

            //relationships
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_resets');
    }
};
