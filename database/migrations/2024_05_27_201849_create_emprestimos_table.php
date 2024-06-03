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
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('book_id');
            $table->date('start_date')->nullable();
            $table->date('return_date')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

            // Adicionando as chaves estrangeiras
            $table->foreign('user_id')->references('id')->on('users_biblioteca')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('book_id')->references('id')->on('livros')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emprestimos');
    }
};
