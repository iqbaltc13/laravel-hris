<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDinasLuarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dinas_luars', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('user_id');
            $table->foreignId('shift_id');
            $table->string('tanggal');
            $table->string('jam_absen')->nullable();
            $table->string('telat')->nullable();
            $table->string('lat_absen')->nullable();
            $table->string('long_absen')->nullable();
            $table->string('foto_jam_absen')->nullable();
            $table->string('jam_pulang')->nullable();
            $table->string('pulang_cepat')->nullable();
            $table->string('foto_jam_pulang')->nullable();
            $table->string('lat_pulang')->nullable();
            $table->string('long_pulang')->nullable();
            $table->string('status_absen')->nullable();
            $table->uuid('created_by_id')->nullable();
            $table->uuid('updated_by_id')->nullable();
            $table->uuid('deleted_by_id')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dinas_luars');
    }
}
