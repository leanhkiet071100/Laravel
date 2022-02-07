<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKeyHinhanhbaiviet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hinhanh_baiviet', function (Blueprint $table) {
            $table->foreign('Id_Baiviet')->references('Id_Baiviet')->on('baiviet');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hinhanh_baiviet', function (Blueprint $table) {
            //
        });
    }
}
