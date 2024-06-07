<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusPtkpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function __construct()
    {
        $this->table_name = 'status_ptkps';
        $this->schema = Schema::connection($this->getConnection());
    }

    public function up()
    {
        $this->schema->create('status_ptkps', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->nullable();
            $table->decimal('ptkp_2016', 15, 2)->default(0);
            $table->decimal('ptkp_2015', 15, 2)->default(0);
            $table->decimal('ptkp_2009_2012', 15, 2)->default(0);
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
        $this->schema->dropIfExists('status_ptkps');
    }
}
