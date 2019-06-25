<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('produtos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('sabor_id');
            $table->unsignedBigInteger('tipo_id');
            $table->unsignedBigInteger('marca_id');
            $table->unsignedBigInteger('litragem_id');
            $table->unique([
                'litragem_id',
                'marca_id',
            ]);
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
