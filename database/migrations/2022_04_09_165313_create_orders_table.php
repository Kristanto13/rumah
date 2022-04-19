<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('kode',20)->default(0);
            $table->date('tanggal');
            $table->integer('customer_id')->default(0);
            $table->integer('rumah_id')->default(0);
            $table->string('jumlah',3)->default(0);
            $table->longText('ket')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
