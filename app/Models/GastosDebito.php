<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GastosDebito extends Model
{
    protected $fillable = ['nome', 'observacao', 'categoria', 'valor', 'id_conta_debito', 'data', 'hora'];

    public function contaDebito(): BelongsTo
    {
        return $this->belongsTo(ContasDebito::class, 'id_conta_debito');
    }
}
?>