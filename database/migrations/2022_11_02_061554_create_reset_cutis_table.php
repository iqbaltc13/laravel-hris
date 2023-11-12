<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResetCutisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reset_cutis', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('izin_cuti');
            $table->string('izin_dinas_luar');
            $table->string('izin_sakit');
            $table->string('izin_cek_kesehatan');
            $table->string('izin_keperluan_pribadi');
            $table->string('izin_telat');
            $table->string('izin_pulang_cepat');
            $table->string('izin_lainnya');
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
        Schema::dropIfExists('reset_cutis');
    }
}
