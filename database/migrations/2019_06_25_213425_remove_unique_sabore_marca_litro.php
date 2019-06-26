<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveUniqueSaboreMarcaLitro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   Schema::disableForeignKeyConstraints();
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign('produtos_litragem_id_foreign');
            $table->dropForeign('produtos_marca_id_foreign');
            $table->dropIndex('produtos_litragem_id_marca_id_unique');
            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->foreign('litragem_id')->references('id')->on('litragens');
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
            //
        });
    }
}
