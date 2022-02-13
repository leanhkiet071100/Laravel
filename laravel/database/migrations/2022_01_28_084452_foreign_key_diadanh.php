<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKeyDiadanh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('diadanhs', function (Blueprint $table) {
            $table->foreign('Id_Nguoidung')->references('id')->on('nguoidungs');
            $table->foreign('Id_Nhucau')->references('id')->on('nhucaus');
            $table->foreign('Id_Mien')->references('id')->on('miens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('diadanh', function (Blueprint $table) {
            //
        });
    }
}
