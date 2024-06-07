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
    public function __construct()
    {
        $this->table_name = 'dinas_luars';
        $this->schema = Schema::connection($this->getConnection());
    }

    public function up()
    {
        $this->schema->create($this->table_name, function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->nullable();
            $table->uuid('shift_id')->nullable();
            $table->string('tanggal')->nullable();
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
        $this->schema->dropIfExists($this->table_name);
    }
}
