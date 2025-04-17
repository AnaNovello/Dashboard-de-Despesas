<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ganhos extends Model
{
    protected $fillable = ['nome', 'data', 'hora', 'valor', 'observacao', 'id_conta_debito'];

    public function contaDebito(): BelongsTo
    {
        return $this->belongsTo(ContasDebito::class, 'id_conta_debito');
    }
}
?>