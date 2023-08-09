<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('google_users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('google_email');
            $table->string('google_id');
            $table->string('google_token');
            $table->string('profile_picture')->nullable();
            $table->timestamps();

            //relationships
            $table->foreign('user_id')->references('id')->on('users');
        });
        DB::statement("ALTER SEQUENCE google_users_id_seq RESTART WITH 101;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('google_users');
    }
};
