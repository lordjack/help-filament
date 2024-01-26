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
        Schema::disableForeignKeyConstraints();

        Schema::create('lote_itens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lote_id')->constrained('lote');
            $table->string('numero', 40);
            $table->string('especificacao', 150)->nullable();
            $table->string('unidade', 50)->nullable();
            $table->integer('quantidade');
            $table->decimal('valor_referencia', 12, 2);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itens_lotes');
    }
};
