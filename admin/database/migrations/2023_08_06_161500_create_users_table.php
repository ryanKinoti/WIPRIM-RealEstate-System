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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->enum('role', ['Admin', 'Manager', 'Tenant']);
            $table->bigInteger('house_unit_id')->unsigned();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->string('id_number');
            $table->string('address');
            $table->string('password');
            $table->enum('payment_method',['MPESA Paybill','Bank Payment','Cash']);
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('account_status', ['activated', 'inactive', 'blocked'])->default('inactive');
            $table->string('google_id')->nullable();
            $table->string('google_token')->nullable();
            $table->string('profile_picture')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
