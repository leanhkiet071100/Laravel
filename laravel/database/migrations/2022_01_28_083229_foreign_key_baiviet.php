<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKeyBaiviet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('baiviets', function (Blueprint $table) {
            $table->foreign('Id_Nguoidung')->references('id')->on('nguoidungs');
            $table->foreign('Id_Ddanh')->references('id')->on('diadanhs');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('baiviet', function (Blueprint $table) {
        });
        
    }
}
