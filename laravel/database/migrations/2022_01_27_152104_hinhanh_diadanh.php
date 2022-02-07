
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HinhanhDiadanh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hinhanh_diadanh', function (Blueprint $table) {
            $table->id('Id_Hinhanh');
            $table->foreignId('Id_Ddanh');
            $table->string('Ten_Hinhanh');
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
        Schema::dropIfExists('hinhanh_diadanh');
    }
}
