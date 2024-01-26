<?php

namespace App\Services;

use App\Helpers\Util;
use App\Models\Julgamento;
use App\Models\Legislacao;
use App\Models\Modalidade;
use App\Models\Municipio;
use App\Models\Participante;
use App\Models\Processo;
use App\Models\Promotor;
use App\Models\Realizacao;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;

//use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Leandrocfe\FilamentPtbrFormFields\Money;
use Leandrocfe\FilamentPtbrFormFields\PhoneNumber;

final class ProcessoView
{
    public static function schemaView(): array
    {
        return [
            Section::make()
                ->columns([
                    'sm' => 2,
                ])
                ->schema([
                    TextEntry::make('legislacao.descricao')
                        ->label(__('Legislação')),
                    TextEntry::make('modalidade.nome')
                        ->label(__('Modalidade')),
                    TextEntry::make('realizacao.nome')
                        ->label(__('Realização')),
                    TextEntry::make('julgamento.nome')
                        ->label(__('Julgamento')),
                    TextEntry::make('promotor.nome')
                        ->label(__('Promotor')),
                    TextEntry::make('municipio.nome')
                        ->label(__('Município')),
                    TextEntry::make('condutor.nome')
                        ->label(__('Condutor')),
                    TextEntry::make('autoridade.nome')
                        ->label(__('Autoridade')),
                    TextEntry::make('numero')
                        ->label(__('Número'))
                        ->limit(150),
                    TextEntry::make('numero_edital')
                        ->label(__('Número Edital'))
                        ->limit(50),
                    TextEntry::make('tipo_contrato')
                        ->limit(80),
                    TextEntry::make('taxa_administrativa')
                        ->limit(20),
                    TextEntry::make('modo_disputa')
                        ->limit(40),
                    TextEntry::make('tempo_inicial')
                        ->label(__('Tempo Inícial')),
                    TextEntry::make('tempo_final')
                        ->label(__('Tempo Final')),
                    TextEntry::make('ano_referencia')
                        ->label(__('Ano Referência'))
                        ->numeric(),
                    TextEntry::make('mensagem')
                        ->limit(20),
                    TextEntry::make('exclusivo_me')
                        ->limit(20),
                    TextEntry::make('exclusivo_regional')
                        ->limit(20),
                    TextEntry::make('exclusivo_local')
                        ->limit(20),
                    TextEntry::make('cadastro_reserva')
                        ->limit(20),
                    TextEntry::make('inversao_fase')
                        ->label(__('Inversão Fase'))
                        ->limit(20),
                    TextEntry::make('valor_total_processo'),
                    TextEntry::make('telefone_promotor')
                        ->afterStateHydrated(fn(string $state): string => __("statuses.{$state}"))
                        ->limit(40),
                    TextEntry::make('email_promotor')
                        ->limit(120),
                    TextEntry::make('objetivo')
                        ->label('Objetivo'),
                    TextEntry::make('observacao')
                        ->label(__('Observação')),
                    TextEntry::make('cotas')
                        ->limit(10),
                    TextEntry::make('tratamento_diferenciado')
                        ->limit(50),
                    TextEntry::make('intervalo_min_lance')
                        ->limit(10),
                    TextEntry::make('tipo_intervalo_lance')
                        ->limit(10),
                    TextEntry::make('valor_intervalo_lance'),
                    TextEntry::make('itens_lote')
                        ->limit(10),
                    TextEntry::make('orcamento_sigiloso')
                        ->label(__('Orcamento Sigiloso'))
                        ->limit(10),
                    TextEntry::make('numero_processo_externo')
                        ->label(__('Número Processo Externo'))
                        ->limit(50),
                    TextEntry::make('numero_processo_interno')
                        ->label(__('Número Processo Interno'))
                        ->limit(50),
                    TextEntry::make('garantia_contratual')
                        ->limit(10),
                    TextEntry::make('casa_decimal_valores')
                        ->limit(40),
                    TextEntry::make('casa_decimal_quantidade')
                        ->limit(40),
                    TextEntry::make('data_inicio_proposta')
                        ->label(__('Data Início Proposta')),
                    TextEntry::make('hora_inicio_proposta')
                        ->label(__('Hora Início Proposta'))
                        ->limit(5),
                    TextEntry::make('data_limite_impugnacao')
                        ->label(__('Data Limite Impugnação')),
                    TextEntry::make('hora_limite_impugnacao')
                        ->label(__('Hora Limite Impugnação'))
                        ->limit(5),
                    TextEntry::make('data_limite_esclarecimento'),
                    TextEntry::make('hora_limite_esclarecimento')
                        ->limit(5),
                    TextEntry::make('data_final_proposta'),
                    TextEntry::make('hora_final_proposta')
                        ->limit(5),
                    TextEntry::make('situacao')
                        ->label(__('Situação'))
                        ->limit(40),
                ])
        ];
    }

    public static function schemaForm(): array
    {
        return [
            Grid::make()
                ->schema([
                    Grid::make()
                        ->columns([
                            'sm' => 2,
                            'md' => 3,
                            'lg' => 4,
                            'xl' => 4,
                            '2xl' => 4,
                        ])
                        ->schema([

                            Select::make('municipio_id')
                                ->label(__('Município'))
                                ->options(Municipio::all()->pluck('nome', 'id'))
                                ->disabled(),
                            TextInput::make('numero')
                                ->label(__('Número'))
                                ->disabled()
                                ->maxLength(150),
                            TextInput::make('numero_edital')
                                ->label(__('Número Edital'))
                                ->disabled()
                                ->maxLength(50),
                            Select::make('modalidade_id')
                                ->label(__('Modalidade'))
                                ->options(Modalidade::all()->pluck('nome', 'id'))
                                ->disabled(),


                            TextInput::make('inversao_fase')
                                ->label(__('Inversão Fase'))
                                ->maxLength(20)
                                ->disabled(),
                            Select::make('condutor_id')
                                ->label(__('Condutor'))
                                ->options(Participante::all()->pluck('nome', 'id'))
                                ->disabled(),
                            Select::make('autoridade_id')
                                ->label(__('Autoridade'))
                                ->options(Participante::all()->pluck('nome', 'id'))
                                ->disabled(),
                            TextInput::make('tipo_contrato')
                                ->maxLength(80)
                                ->disabled(),


                            Select::make('legislacao_id')
                                ->label(__('Legislação'))
                                ->options(Legislacao::all()->pluck('descricao', 'id'))
                                ->disabled(),
                            Select::make('realizacao_id')
                                ->label(__('Realização'))
                                ->options(Realizacao::all()->pluck('nome', 'id'))
                                ->disabled(),
                            Select::make('julgamento_id')
                                ->label(__('Julgamento'))
                                ->options(Julgamento::all()->pluck('nome', 'id'))
                                ->disabled(),
                            Select::make('promotor_id')
                                ->label(__('Promotor'))
                                ->options(Promotor::all()->pluck('nome', 'id'))
                                ->disabled(),
                            TextInput::make('data_inicio_proposta')
                                ->label(__('Data Início Proposta'))
                                //concatena dois atributos
                                ->afterStateHydrated(function (TextInput $component, string $state, Processo $processo) {
                                    $date = date('d/m/Y', strtotime($processo->data_inicio_proposta)) . " " . date('H:i', strtotime($processo->hora_inicio_proposta));
                                    $component->state($date);
                                })
                                ->disabled(),
                            TextInput::make('data_final_proposta')
                                ->label(__('Data Final Proposta'))
                                ->afterStateHydrated(function (TextInput $component, string $state, Processo $processo) {
                                    $date = date('d/m/Y', strtotime($processo->data_final_proposta)) . " " . date('H:i', strtotime($processo->hora_final_proposta));
                                    $component->state($date);
                                })
                                ->disabled(),
                            TextInput::make('data_limite_impugnacao')
                                ->label(__('Data Limite Impugnação'))
                                ->afterStateHydrated(function (TextInput $component, string $state, Processo $processo) {
                                    $date = date('d/m/Y', strtotime($processo->data_limite_impugnacao)) . " " . date('H:i', strtotime($processo->hora_limite_impugnacao));
                                    $component->state($date);
                                })
                                ->disabled(),
                            TextInput::make('data_limite_esclarecimento')
                                ->label(__('Data Limite Esclarecimento'))
                                ->afterStateHydrated(function (TextInput $component, string $state, Processo $processo) {
                                    $date = date('d/m/Y', strtotime($processo->data_limite_esclarecimento)) . " " . date('H:i', strtotime($processo->hora_limite_esclarecimento));
                                    $component->state($date);
                                })
                                ->disabled(),


                            TextInput::make('taxa_administrativa')
                                ->maxLength(20)
                                ->disabled(),
                            TextInput::make('modo_disputa')
                                ->maxLength(40)
                                ->disabled(),
                            TextInput::make('tempo_inicial')
                                ->label(__('Tempo Inícial'))
                                ->disabled(),
                            TextInput::make('tempo_final')
                                ->label(__('Tempo Final'))
                                ->disabled(),
                            TextInput::make('ano_referencia')
                                ->label(__('Ano Referência'))
                                ->numeric()
                                ->disabled(),
                            TextInput::make('mensagem')
                                ->maxLength(20)
                                ->disabled(),
                            TextInput::make('exclusivo_me')
                                ->maxLength(20)
                                ->disabled(),
                            TextInput::make('exclusivo_regional')
                                ->maxLength(20)
                                ->disabled(),
                            TextInput::make('exclusivo_local')
                                ->maxLength(20)
                                ->disabled(),
                            TextInput::make('cadastro_reserva')
                                ->maxLength(20)
                                ->disabled(),

                            TextInput::make('tipo_intervalo_lance')
                                ->maxLength(10)
                                ->disabled(),
                            TextInput::make('intervalo_min_lance')
                                ->maxLength(10)
                                ->disabled(),
                            Money::make('valor_intervalo_lance')
                                ->numeric()
                                ->disabled(),


                            TextInput::make('cotas')
                                ->maxLength(10)
                                ->disabled(),
                            TextInput::make('tratamento_diferenciado')
                                ->maxLength(50)
                                ->disabled(),

                            TextInput::make('numero_processo_externo')
                                ->label(__('Número Processo Externo'))
                                ->disabled()
                                ->maxLength(50),
                            TextInput::make('numero_processo_interno')
                                ->label(__('Número Processo Interno'))
                                ->disabled()
                                ->maxLength(50),
                            TextInput::make('garantia_contratual')
                                ->maxLength(10)
                                ->disabled(),

                            Select::make('situacao')
                                ->label(__('Situação'))
                                ->options(Util::situacaoProcesso())
                                ->disabled(),


                            Grid::make()
                                ->columns([
                                    'sm' => 1,
                                    'md' => 2,
                                    'lg' => 2,
                                    'xl' => 2,
                                    '2xl' => 2,
                                ])
                                ->schema([
                                    TextInput::make('email_promotor')
                                        ->email()
                                        ->maxLength(120)
                                        ->disabled(),
                                    PhoneNumber::make('telefone_promotor')
                                        ->format('(99) 99999-9999')
                                        ->maxLength(40)
                                        ->disabled(),
                                    Textarea::make('objetivo')
                                        ->disabled(),
                                    Textarea::make('observacao')
                                        ->label(__('Observação'))
                                        ->disabled(),
                                ]),


                        ]) //grid 4 colunas
                ]) //grid principal coluna 1
        ];

    }
}
