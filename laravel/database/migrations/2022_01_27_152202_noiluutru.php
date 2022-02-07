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
        Schema::create('noiluutru', function (Blueprint $table) {
            $table->id('Id_Noiluutru');
            $table->foreignId('Id_Ddanh');
            $table->string('Ten_Noiluutru');
            $table->string('Hinh_Noiluutru');
            $table->string('Diachi_Noiluutru');
            $table->string('SDT_Noiluutru');
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
        Schema::dropIfExists('noiluutru');
    }
}
