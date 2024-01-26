<?php

namespace App\Models;

use App\Models\Shop\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Processo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'processo';
    protected $fillable = [
        'numero',
        'objetivo',
        'situacao',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',

    ];


    public function processoArquivo(): hasMany
    {
        return $this->hasMany(ProcessoArquivo::class, 'processo_id');
    }

    public function lote(): BelongsTo
    {
        return $this->belongsTo(Lote::class,'processo_id');
    }

    public function processoLote(): hasMany
    {
        return $this->hasMany(Lote::class, 'processo_id');
    }

    public function itensLote(): HasManyThrough
    {
        return $this->hasManyThrough(
            Lote::class,
            LoteItens::class,
            'processo_id', // Foreign key on the environments table...
            'lote_id', // Foreign key on the deployments table...
            'id', // Local key on the projects table...
            'id' // Local key on the environments table...
        );
    }

}
