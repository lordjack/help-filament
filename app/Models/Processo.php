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
        'legislacao_id',
        'modalidade_id',
        'realizacao_id',
        'julgamento_id',
        'promotor_id',
        'numero',
        'numero_edital',
        'municipio_id',
        'condutor_id',
        'autoridade_id',
        'tipo_contrato',
        'taxa_administrativa',
        'modo_disputa',
        'tempo_inicial',
        'tempo_final',
        'ano_referencia',
        'mensagem',
        'exclusivo_me',
        'exclusivo_regional',
        'exclusivo_local',
        'cadastro_reserva',
        'inversao_fase',
        'valor_total_processo',
        'telefone_promotor',
        'email_promotor',
        'objetivo',
        'observacao',
        'cotas',
        'tratamento_diferenciado',
        'intervalo_min_lance',
        'tipo_intervalo_lance',
        'valor_intervalo_lance',
        'orcamento_sigiloso',
        'numero_processo_externo',
        'numero_processo_interno',
        'garantia_contratual',
        'casa_decimal_valores',
        'casa_decimal_quantidade',
        'data_inicio_proposta',
        'hora_inicio_proposta',
        'data_limite_impugnacao',
        'hora_limite_impugnacao',
        'data_limite_esclarecimento',
        'hora_limite_esclarecimento',
        'data_final_proposta',
        'hora_final_proposta',
        'situacao',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'legislacao_id' => 'integer',
        'modalidade_id' => 'integer',
        'realizacao_id' => 'integer',
        'julgamento_id' => 'integer',
        'promotor_id' => 'integer',
        'municipio_id' => 'integer',
        'condutor_id' => 'integer',
        'autoridade_id' => 'integer',
        'valor_total_processo' => 'float',
        'valor_intervalo_lance' => 'float',
        'data_inicio_proposta' => 'date',
        'data_limite_impugnacao' => 'date',
        'data_limite_esclarecimento' => 'date',
        'data_final_proposta' => 'date',
        'origem_recurso' => 'array',
    ];
    /*
        public function legislacao(): HasOne
        {
            return $this->hasOne(Legislacao::class);
        }

        public function modalidade(): HasOne
        {
            return $this->hasOne(Modalidade::class);
        }

        public function realizacao(): HasOne
        {
            return $this->hasOne(Realizacao::class);
        }

        public function julgamento(): HasOne
        {
            return $this->hasOne(Julgamento::class);
        }

        public function participante(): HasOne
        {
            return $this->hasOne(Participante::class);
        }
            public function municipio(): HasOne
            {
                return $this->hasOne(Municipio::class);
            }
        */
    /*
    public function participante(): HasOne
    {
        return $this->belongsTo(Participante::class);
    }*/
    public function legislacao(): BelongsTo
    {
        return $this->belongsTo(Legislacao::class);
    }

    public function modalidade(): BelongsTo
    {
        return $this->belongsTo(Modalidade::class);
    }

    public function realizacao(): BelongsTo
    {
        return $this->belongsTo(Realizacao::class);
    }

    public function julgamento(): BelongsTo
    {
        return $this->belongsTo(Julgamento::class);
    }

    public function promotor(): BelongsTo
    {
        return $this->belongsTo(Participante::class);
    }

    public function municipio(): BelongsTo
    {
        return $this->belongsTo(Municipio::class);
    }

    public function condutor(): BelongsTo
    {
        return $this->belongsTo(Participante::class);
    }

    public function autoridade(): BelongsTo
    {
        return $this->belongsTo(Participante::class);
    }

    public function processoArquivo(): hasMany
    {
        return $this->hasMany(ProcessoArquivo::class, 'processo_id');
    }
/*
    public function lote(): BelongsTo
    {
        return $this->belongsTo(Lote::class,'processo_id');
    }
*/
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

    public function processoDocumento(): hasMany
    {
        return $this->hasMany(ProcessoDocumento::class, 'processo_id');
    }

    public function processoRelatorio(): hasMany
    {
        return $this->hasMany(ProcessoRelatorio::class, 'processo_id');
    }

    public function regionalidade(): BelongsToMany
    {
        return $this->belongsToMany(Municipio::class, 'processo_regionalidade', 'processo_id', 'municipio_id')->withTimestamps();
    }

    public function origemRecurso(): BelongsToMany
    {
        return $this->belongsToMany(OrigemRecurso::class, 'processo_origem_recurso', 'processo_id', 'origem_recurso_id')->withTimestamps();

    }

}
