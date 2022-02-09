<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Nguoidung extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nguoidungs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Id_Ddanh');
            $table->string('Hoten_Nguoidung');
            $table->string('Email');
            $table->string('Sodienthoai');
            $table->string('Taikhoan');
            $table->string('Matkhau');
            $table->integer('Phanquyen');
            $table->integer('Trangthai_Hoten');
            $table->integer('Trangthai_Email');
            $table->integer('Trangthai_Sodienthoai');
            $table->integer('TrangThaiNguoiDung');
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
        Schema::dropIfExists('nguoidung');
    }
}
