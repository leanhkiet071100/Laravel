<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Luotxem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('luotxem', function (Blueprint $table) {
            $table->id('Id_Xem');
            $table->foreignId('Id_Nguoidung');
            $table->foreignId('Id_Ddanh');
            $table->boolean('Xem');
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
        Schema::dropIfExists('luotxem');
    }
}
