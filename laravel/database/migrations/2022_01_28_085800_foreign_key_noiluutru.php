<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKeyNoiluutru extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('noiluutrus', function (Blueprint $table) {
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
        Schema::table('noiluutru', function (Blueprint $table) {
            //
        });
    }
}
