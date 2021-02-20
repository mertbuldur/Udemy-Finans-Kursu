<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeklifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teklifs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userId');
            $table->integer('musteriId');
            $table->double('fiyat');
            $table->text('aciklama')->nullable();
            $table->integer('status'); // 0 ise açık teklif , 1 ise onaylanmış teklif.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teklifs');
    }
}
