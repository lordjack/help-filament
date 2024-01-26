<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LoteResource\Pages;
use App\Filament\Resources\LoteResource\RelationManagers;
use App\Models\Lote;
use App\Models\Processo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class LoteResource extends Resource
{
    protected static ?string $model = Lote::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Processo';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('numero')
                    ->required()
                    ->maxLength(3),
                Forms\Components\Select::make('processo_id')
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
                Forms\Components\TextInput::make('tipo_lance')
                    ->required()
                    ->maxLength(150),
                Forms\Components\TextInput::make('margem_lance')
                    ->required()
                    ->maxLength(40),
                Forms\Components\TextInput::make('valor_referencia')
                    ->label(__('Valor Referência'))
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('numero')
                    ->searchable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('processo.numero')
                    ->label(__('Processo Edital'))
                    ->searchable()
                    ->sortable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('processo.numero_edital')
                    ->label(__('Número Edital'))
                    ->searchable()
                    ->sortable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('tipo_lance')
                    ->searchable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('margem_lance')
                    ->searchable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('valor_referencia')
                    ->label(__('Valor Referência'))
                    ->numeric()
                    ->limit(50),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateDescription('');
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\LoteItensRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLotes::route('/'),
            'create' => Pages\CreateLote::route('/create'),
            'edit' => Pages\EditLote::route('/{record}/edit'),
        ];
    }
}
