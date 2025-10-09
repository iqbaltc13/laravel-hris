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
    public function __construct()
    {
        $this->table_name = 'lemburs';
        $this->schema = Schema::connection($this->getConnection());
    }

    public function up()
    {
        $this->schema->create($this->table_name, function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('user_id')->nullable();
            $table->string('tanggal')->nullable();
            $table->string('jam_masuk')->nullable();
            $table->string('lat_masuk')->nullable();
            $table->string('long_masuk')->nullable();
            $table->string('jarak_masuk')->nullable();
            $table->string('foto_jam_masuk')->nullable();
            $table->string('jam_keluar')->nullable();
            $table->string('lat_keluar')->nullable();
            $table->string('long_keluar')->nullable();
            $table->string('jarak_keluar')->nullable();
            $table->string('foto_jam_keluar')->nullable();
            $table->string('total_lembur')->nullable();
            $table->string('status')->nullable();
            $table->string('notes')->nullable();
            $table->string('approved_by')->nullable();
            $table->foreign('approved_by')->references('id')->on('users');
            $table->string('created_by_id')->nullable();
            $table->string('updated_by_id')->nullable();
            $table->string('deleted_by_id')->nullable();
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
