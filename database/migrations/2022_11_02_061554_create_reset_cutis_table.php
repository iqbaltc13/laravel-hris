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
    public function __construct()
    {
        $this->table_name = 'reset_cutis';
        $this->schema = Schema::connection($this->getConnection());
    }

    public function up()
    {
        $this->schema->create($this->table_name, function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('izin_cuti')->nullable();
            $table->string('izin_dinas_luar')->nullable();
            $table->string('izin_sakit')->nullable();
            $table->string('izin_cek_kesehatan')->nullable();
            $table->string('izin_keperluan_pribadi')->nullable();
            $table->string('izin_telat')->nullable();
            $table->string('izin_pulang_cepat')->nullable();
            $table->string('izin_lainnya')->nullable();
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
