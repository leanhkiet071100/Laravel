
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Monan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monan', function (Blueprint $table) {
            $table->id('Id_Mon');
            $table->foreignId('Id_Quan');
            $table->string('Ten_Mon');
            $table->string('Hinh_Mon');
            $table->string('Gia_ban');
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
        Schema::dropIfExists('monan');
    }
}
