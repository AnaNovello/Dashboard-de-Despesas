<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ganhos extends Model
{
    protected $table = 'ganhos';

    protected $fillable = ['nome', 'data', 'hora', 'valor', 'observacao', 'conta_debito_id'];

    public function contaDebito(): BelongsTo
    {
        return $this->belongsTo(ContasDebito::class, 'conta_debito_id');
    }
}
?>