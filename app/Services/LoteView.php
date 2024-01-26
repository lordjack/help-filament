<?php

namespace App\Services;

use App\Helpers\Util;
use App\Models\Processo;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Infolists\Components\Section as SectionInfolists;
use Illuminate\Support\Str;

final class LoteView
{
    public static function schemaView(): array
    {
        return [
            Section::make()
                ->columns([
                    'sm' => 2,
                ])
                ->schema([
                    TextInput::make('numero')
                        ->required()
                        ->maxLength(4),
                    Select::make('processo_id')
                        ->label(__('Processo'))
                        ->options(function () {
                            return Processo::all()->mapWithKeys(function ($record) {
                                return [$record->id => $record->numero . ' - TIPO: ' . $record->tipo_contrato];
                            });
                        })
                        ->searchable()
                        ->preload(),
                    /*  ->label(__('Pregão'))
                      ->options(Pregao::all()->pluck('nome', 'id'))
                      ->searchable()
                      ->required(),*/
                    TextInput::make('tipo_lance')
                        ->required()
                        ->maxLength(150),
                    TextInput::make('margem_lance')
                        ->required()
                        ->maxLength(40),
                    TextInput::make('valor_referencia')
                        ->label(__('Valor Referência'))
                        ->required()
                        ->numeric(),
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
                            'lg' => 3,
                            'xl' => 3,
                            '2xl' => 3,
                        ])
                        ->schema([
                            TextInput::make('numero')
                                ->label(__('Número'))
                                ->disabled()
                                ->maxLength(4),
                            Select::make('processo_id')
                                ->label(__('Processo'))
                                ->options(function () {
                                    return Processo::all()->mapWithKeys(function ($record) {
                                        return [$record->id => Str::limit($record->numero . ' - TIPO: ' . $record->tipo_contrato, 35)];
                                    });
                                })
                                ->disabled()
                                ->searchable()
                                ->preload(),
                            TextInput::make('tipo_lance')
                                ->disabled()
                                ->maxLength(150),
                            TextInput::make('margem_lance')
                                ->disabled()
                                ->maxLength(40),
                            TextInput::make('valor_referencia')
                                ->label(__('Valor Referência'))
                                ->disabled()
                                ->numeric(),


                            Grid::make()
                                ->columns([
                                    'sm' => 1,
                                    'md' => 2,
                                    'lg' => 2,
                                    'xl' => 2,
                                    '2xl' => 2,
                                ])
                                ->schema([

                                ]),


                        ]) //grid 4 colunas
                ]) //grid principal coluna 1
        ];

    }
}
