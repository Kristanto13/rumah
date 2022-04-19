<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromosiTable extends Migration
{
    public function up()
    {
        Schema::create('promosi', function (Blueprint $table) {
            $table->id();
            $table->integer('rumah_id')->default(0);
            $table->date('awal');
            $table->date('akhir');
            $table->string('cashback',20)->default(0);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('promosi');
    }
}
