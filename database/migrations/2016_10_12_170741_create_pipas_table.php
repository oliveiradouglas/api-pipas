<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePipasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('pipas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cor', 50);
            $table->enum('tamanho', ['pequeno', 'médio', 'grande']);
            $table->decimal('preco', 12);
            $table->string('foto', 100)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('pipas');
    }
}
