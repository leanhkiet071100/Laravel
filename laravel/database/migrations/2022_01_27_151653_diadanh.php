<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Diadanh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diadanh', function (Blueprint $table) {
            $table->id('Id_Ddanh');
            $table->foreignId('Id_Nhucau');
            $table->foreignId('Id_Mien');
            $table->foreignId('Id_Nguoidung');
            $table->string('Ten_Ddanh');
            $table->string('Ten_Goikhac');
            $table->string('Mota');
            $table->string('Diachi_Ddanh');
            $table->longText('Canhvat');
            $table->longText('Khihau');
            $table->longText('Tainghuyen');
            $table->integer('Kinhdo');
            $table->integer('Vido');
            $table->integer('Trangthai');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diadanh');
    }
}
