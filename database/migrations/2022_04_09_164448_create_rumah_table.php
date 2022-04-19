<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRumahTable extends Migration
{
    public function up()
    {
        Schema::create('rumah', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('nama');
            $table->longText('alamat');
            $table->string('daerah');
            $table->string('kamar',3)->default(0);
            $table->string('toilet',3)->default(0);
            $table->string('lantai',3)->default(0);
            $table->string('jenis');
            $table->string('harga')->default(0);
            $table->string('ukuran');
            $table->string('unit',5)->default(0);
            $table->string('is_pasar',1)->default('n');
            $table->string('is_banjir',1)->default('n');
            $table->string('file_1')->nullable();
            $table->string('file_2')->nullable();
            $table->string('file_3')->nullable();
            $table->string('file_4')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('rumah');
    }
}
