<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('FirstName');
            $table->string('LastName');
            $table->string('MiddleName');
            $table->string('suffix')->default('');

            $table->string('profile_picture')->nullable();

            $table->string('civil_status')->default('');
            $table->string('nationality')->default('');
            $table->string('address');
            $table->string('birthdate');
            $table->string('gender');

            $table->string('bio');

            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
