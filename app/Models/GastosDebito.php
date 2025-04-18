<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GastosDebito extends Model
{
    protected $table = 'gastos_debito';

    protected $fillable = ['nome', 'observacao', 'categoria', 'valor', 'conta_debito_id', 'data', 'hora'];

    public function contaDebito(): BelongsTo
    {
        return $this->belongsTo(ContasDebito::class, 'conta_debito_id');
    }
}
?>