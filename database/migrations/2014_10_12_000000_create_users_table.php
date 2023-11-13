<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('foto_karyawan')->nullable();
            $table->string('foto_face_recognition')->nullable();
            $table->string('email');
            $table->string('telepon');
            $table->string('username');
            $table->string('password');
            $table->string('tgl_lahir');
            $table->string('gender');
            $table->string('tgl_join');
            $table->string('status_nikah');
            $table->text('alamat');
            $table->string('izin_cuti');
            $table->string('izin_dinas_luar');
            $table->string('izin_sakit');
            $table->string('izin_cek_kesehatan');
            $table->string('izin_keperluan_pribadi');
            $table->string('izin_telat');
            $table->string('izin_pulang_cepat');
            $table->string('izin_lainnya');
            $table->string('is_admin');
            $table->uuid('jabatan_id')->nullable();
            $table->uuid('golongan_id')->nullable();
            $table->uuid('lokasi_id')->nullable();
            $table->dateTime('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
