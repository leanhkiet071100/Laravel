<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKeyHinhanhdiadanh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hinhanh_diadanh', function (Blueprint $table) {
            $table->foreign('Id_Ddanh')->references('Id_Ddanh')->on('diadanh');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hinhanh_diadanh', function (Blueprint $table) {
            //
        });
    }
}
