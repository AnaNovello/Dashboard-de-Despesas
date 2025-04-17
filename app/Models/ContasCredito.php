<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ContasCredito extends Model
{
    protected $fillable = ['nome', 'limite', 'user_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function gastos(): HasMany
    {
        return $this->hasMany(GastosCredito::class, 'id_conta_credito');
    }
}
?>
