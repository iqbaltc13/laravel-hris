<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function __construct()
    {
        $this->table_name = 'payrolls';
        $this->schema = Schema::connection($this->getConnection());
    }
    public function up()
    {
        $this->schema->create($this->table_name, function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('user_id')->nullable();
            $table->string('bulan')->nullable();
            $table->string('tahun')->nullable();
            $table->string('status_id')->nullable();
            $table->foreign('status_id')->references('id')->on('status_ptkps');
            $table->decimal('gaji', 15, 2)->default(0);
            $table->decimal('pot_tunjangan_makan', 15, 2)->default(0);
            $table->decimal('pot_tunjangan_transport', 15, 2)->default(0);
            $table->decimal('setoran_bpjs_kes', 15, 2)->default(0);
            $table->decimal('tunjangan_bpjs_kes', 15, 2)->default(0);
            $table->decimal('setoran_bpjs_tk', 15, 2)->default(0);
            $table->decimal('tunjangan_bpjs_tk', 15, 2)->default(0);
            $table->decimal('tunjangan_pensiun', 15, 2)->default(0);
            $table->decimal('tunjangan_komunikasi', 15, 2)->default(0);
            $table->decimal('tunjangan_pph_21', 15, 2)->default(0);
            $table->decimal('pot_lainnya', 15, 2)->default(0);
            $table->decimal('lembur', 15, 2)->default(0);
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
