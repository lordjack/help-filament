<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class LoteItens extends Model
{
    use HasFactory;

    protected $table = 'lote_itens';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lote_id',
        'numero',
        'especificacao',
        'unidade',
        'quantidade',
        'valor_referencia',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'lote_id' => 'integer',
        'valor_referencia' => 'decimal:2',
    ];

    public function lote(): belongsTo
    {
        return $this->belongsTo(Lote::class);
    }

}
