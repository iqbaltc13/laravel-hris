<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLembursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lemburs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('user_id');
            $table->string('tanggal');
            $table->string('jam_masuk');
            $table->string('lat_masuk');
            $table->string('long_masuk');
            $table->string('jarak_masuk');
            $table->string('foto_jam_masuk');
            $table->string('jam_keluar')->nullable();
            $table->string('lat_keluar')->nullable();
            $table->string('long_keluar')->nullable();
            $table->string('jarak_keluar')->nullable();
            $table->string('foto_jam_keluar')->nullable();
            $table->string('total_lembur')->nullable();
            $table->string('status')->nullable();
            $table->string('notes')->nullable();
            $table->uuid('approved_by')->nullable();
            $table->foreign('approved_by')->references('id')->on('users');
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
        Schema::dropIfExists('lemburs');
    }
}
