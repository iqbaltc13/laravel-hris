<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLokasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function __construct()
    {
        $this->table_name = 'lokasis';
        $this->schema = Schema::connection($this->getConnection());
    }

    public function up()
    {
        Schema::create('lokasis', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_lokasi')->nullable();
            $table->string('lat_kantor')->nullable();
            $table->string('long_kantor')->nullable();
            $table->string('radius')->nullable();
            $table->string('status')->nullable();
            $table->uuid('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
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
        Schema::dropIfExists('lokasis');
    }
}
