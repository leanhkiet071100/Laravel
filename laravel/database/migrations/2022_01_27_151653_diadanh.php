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
        Schema::create('diadanhs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Id_Nhucau');
            $table->foreignId('Id_Mien');
            $table->foreignId('Id_Nguoidung');
            $table->string('Ten_Ddanh');
            $table->string('Ten_Goikhac');
            $table->string('Mota_Ddanh');
            $table->string('Diachi_Ddanh');
            $table->longText('Canhvat');
            $table->longText('Khihau');
            $table->longText('Tainghuyen');
            $table->double('Kinhdo');
            $table->double('Vido');
            $table->integer('TrangThaiDiaDanh');
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
