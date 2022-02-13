<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Noiluutru extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noiluutrus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Id_Ddanh');
            $table->string('Ten_Noiluutru');
            $table->string('Hinh_Noiluutru');
            $table->string('Diachi_Noiluutru');
            $table->string('SDT_Noiluutru');
            $table->integer('TrangThaiNoiLuuTru');
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
        Schema::dropIfExists('noiluutru');
    }
}
