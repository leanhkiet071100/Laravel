<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKeyDanhgia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('danhgia', function (Blueprint $table) {
            $table->foreign('Id_Ddanh')->references('Id_Ddanh')->on('diadanh');
            $table->foreign('Id_Nguoidung')->references('Id_Nguoidung')->on('nguoidung');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('danhgia', function (Blueprint $table) {
        });
    }
}
