<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ContasDebito extends Model
{
    protected $table = 'contas_debito';

    protected $fillable = ['nome', 'user_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function ganhos(): HasMany
    {
        return $this->hasMany(Ganhos::class, 'conta_debito_id');
    }

    public function gastos(): HasMany
    {
        return $this->hasMany(GastosDebito::class, 'conta_debito_id');
    }

    public function getSaldoCalculadoAttribute()
    {
        $totalGanhos = $this->ganhos()->sum('valor');
        $totalGastos = $this->gastos()->sum('valor');
        return $totalGanhos - $totalGastos;
    }
}
?>