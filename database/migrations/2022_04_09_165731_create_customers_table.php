<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('no_ktp',16)->unique()->nullable();
            $table->string('nama');
            $table->string('phone',16)->unique();
            $table->string('email')->unique();
            $table->enum('gender',['-','L','P'])->default('-');
            $table->longText('alamat')->nullable();
            $table->string('kota')->nullable();
            $table->string('kodepos',5)->nullable();
            $table->string('password')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
