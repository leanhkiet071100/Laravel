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
        
        Schema::table('diadanh', function (Blueprint $table) {
            $table->foreign('Id_Nguoidung')->references('Id_Nguoidung')->on('nguoidung');
            $table->foreign('Id_Nhucau')->references('Id_Nhucau')->on('nhucau');
            $table->foreign('Id_Mien')->references('Id_Mien')->on('mien');
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
