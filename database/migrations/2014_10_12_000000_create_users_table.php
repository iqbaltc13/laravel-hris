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
    public function __construct()
    {
        $this->table_name = 'users';
        $this->schema = Schema::connection($this->getConnection());
    }

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->nullable();
            $table->string('foto_karyawan')->nullable();
            $table->string('foto_face_recognition')->nullable();
            $table->string('email')->nullable();;
            $table->string('telepon')->nullable();;
            $table->string('username')->nullable();;
            $table->string('password')->nullable();;
            $table->string('tgl_lahir')->nullable();;
            $table->string('gender')->nullable();;
            $table->string('tgl_join')->nullable();;
            $table->string('status_nikah')->nullable();;
            $table->text('alamat')->nullable();;
            $table->string('izin_cuti')->nullable();
            $table->string('izin_dinas_luar')->nullable();
            $table->string('izin_sakit')->nullable();
            $table->string('izin_cek_kesehatan')->nullable();
            $table->string('izin_keperluan_pribadi')->nullable();
            $table->string('izin_telat')->nullable();
            $table->string('izin_pulang_cepat')->nullable();
            $table->string('izin_lainnya')->nullable();
            $table->string('is_admin')->nullable();
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
