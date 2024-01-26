<?php

namespace App\Filament\Resources\LoteResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LoteItensRelationManager extends RelationManager
{
    protected static string $relationship = 'itemsUnits';

    protected static ?string $title = 'Itens';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('numero')
                    ->label(__('Número'))
                    ->required()
                    ->maxLength(40),
                Forms\Components\TextInput::make('especificacao')
                    ->label(__('Especificação'))
                    ->maxLength(150),
                Forms\Components\TextInput::make('unidade')
                    ->maxLength(50),
                Forms\Components\TextInput::make('quantidade')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('valor_referencia')
                    ->label(__('Valor Referência'))
                    ->required()
                    ->numeric(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('numero')
            ->columns([
                Tables\Columns\TextColumn::make('numero')
                    ->label(__('Número'))
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('especificacao')
                    ->label(__('Especificação'))
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('unidade')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('quantidade')
                    ->limit(50)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('valor_referencia')
                    ->label(__('Valor Referência'))
                    ->limit(50)
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()->label(__('Novo'))
                    ->mountUsing(function (Form $form) {
                        $form->fill(['lote_id' => $this->getOwnerRecord()->id]);
                    })
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateDescription('');
    }
}
