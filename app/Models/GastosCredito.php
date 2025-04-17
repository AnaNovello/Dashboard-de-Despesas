<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GastosCredito extends Model
{
    protected $table = 'gastos_credito';
    
    protected $fillable = [
        'nome', 'observacao', 'categoria', 'responsavel', 'parcela', 'parcelas_totais', 'gasto_unitario', 'id_conta_credito', 'data', 'hora'
    ];

    // Acessor para calcular o gasto total
    public function getGastoTotalAttribute()
    {
        return $this->parcelas_totais * $this->gasto_unitario;
    }

    // Definindo relacionamento com ContaCredito
    public function contaCredito()
    {
        return $this->belongsTo(ContaCredito::class, 'id_conta_credito');
    }
}

?>