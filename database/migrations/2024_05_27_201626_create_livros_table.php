<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('author');
            $table->string('registration_number_book')->unique();
            $table->bigInteger('genre_id')->unsigned()->nullable();
            $table->string('status', 200)->nullable();
            $table->timestamps();

            // Indexes
            $table->index('genre_id');

            // Adicionando as chaves estrangeiras
            $table->foreign('genre_id')->references('id')->on('generos')->onDelete('restrict')->onUpdate('restrict');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livros');
    }
};
