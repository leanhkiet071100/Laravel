<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HinhanhBaiviet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hinhanh_baiviets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Id_Baiviet');
            $table->string('Ten_Hinhanh');
            $table->integer('TrangThaiHinhAnhBV');
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
        Schema::dropIfExists('hinhanh_baiviet');
    }
}
