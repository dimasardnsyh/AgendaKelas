<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Agendas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_guru')->unsigned()->nullable();
            $table->bigInteger('id_kelas')->unsigned()->nullable();
            $table->string('materi');
            $table->enum('jenis',['PTM' ,'PJJ']);
            $table->string('link')->nullable();
            $table->string('siswa_hadir')->nullable();
            $table->string('siswa_tidak_hadir')->nullable();
            $table->string('dokumentasi')->nullable();
            $table->string('keterangan');
            $table->string('jam_mulai');
            $table->string('jam_akhir');
            $table->timestamps();

            $table->foreign('id_guru')->references('id')->on('gurus')->onDelete('SET NULL');
            $table->foreign('id_kelas')->references('id')->on('kelass')->onDelete('SET NULL');
                    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendas');
    }
}
