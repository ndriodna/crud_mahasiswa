<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->integer('nim');
            $table->unsignedBigInteger('jurusan_id');
            $table->string('nama');
            $table->enum('jenis_kelamin',['L','P']);
            $table->text('alamat');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->year('thn_masuk');
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
        Schema::dropIfExists('mahasiswas');
    }
}
