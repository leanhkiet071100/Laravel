u<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Quanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Id_Ddanh');
            $table->string('Ten_Quan');
            $table->string('Hinh_Quan');
            $table->string('Diachi_Quan');
            $table->string('SDT_Quan');
            $table->integer('TrangThaiQuanAn');
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
        Schema::dropIfExists('quanan');
    }
}
