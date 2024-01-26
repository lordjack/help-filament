<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lote extends Model
{
    use HasFactory;

    protected $table = 'lote';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'processo_id',
        'numero',
        'tipo_lance',
        'margem_lance',
        'valor_referencia',
    ];

    protected $casts = [
        'id' => 'integer',
        'processo_id' => 'integer',
        'numero' => 'integer',
        'valor_referencia' => 'decimal:2',
    ];

    public function itemsUnits(): hasMany
    {
        return $this->hasMany(LoteItens::class,'lote_id');
    }

    public function processo(): BelongsTo
    {
        return $this->belongsTo(Processo::class);
    }
}
