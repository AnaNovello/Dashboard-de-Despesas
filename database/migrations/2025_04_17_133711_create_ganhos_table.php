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
        Schema::create('ganhos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->date('data');
            $table->time('hora');
            $table->decimal('valor', 10, 2);
            $table->text('observacao')->nullable();
            $table->foreignId('conta_debito_id')->constrained('contas_debito')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ganhos');
    }
};
