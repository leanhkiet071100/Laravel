
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Luotthich extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('luotthichs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Id_Nguoidung');
            $table->foreignId('Id_Ddanh');
            $table->boolean('Thich');
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
        Schema::dropIfExists('luotthich');
    }
}
