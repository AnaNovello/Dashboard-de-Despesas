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
        Schema::create('gastos_credito', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('observacao')->nullable();
            $table->string('categoria');
            $table->string('responsavel');
            $table->integer('parcela');
            $table->decimal('gasto_unitario', 10, 2);
            $table->decimal('gasto_total', 10, 2);
            $table->foreignId('conta_credito_id')->constrained('contas_credito')->onDelete('cascade');
            $table->date('data');
            $table->time('hora');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gastos_credito');
    }
};
