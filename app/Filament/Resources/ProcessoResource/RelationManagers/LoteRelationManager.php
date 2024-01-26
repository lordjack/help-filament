<?php

namespace App\Filament\Resources\ProcessoResource\RelationManagers;

use App\Filament\Resources\ProcessoResource;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Pages\ManageRelatedRecords;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;

class LoteRelationManager extends ManageRelatedRecords
{
    protected static string $resource = ProcessoResource::class; // 1 processo tem muitos lotes
    protected static string $relationship = 'processoLote'; // 1 lote tem muitos itens
    public function form(Form $form): Form {
        return $form
            ->schema([
                Forms\Components\TextInput::make('numero')
                    ->required()
                    ->maxLength(3),
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
                Forms\Components\Section::make('Itens')
                    ->description('Itens do lote.')
                    ->schema([
                        Forms\Components\Repeater::make('itemsUnits')
                            ->relationship('itemsUnits')->label("")
                            ->dehydrated(false)
                            ->schema([
                                Forms\Components\TextInput::make('numero')
                                    ->label(__('Número'))
                                    ->required(),
                                Forms\Components\TextInput::make('especificacao')
                                    ->label(__('Especificação'))
                                    ->required(),
                                Forms\Components\TextInput::make('unidade')
                                    ->required(),
                                Forms\Components\TextInput::make('quantidade')
                                    ->required(),
                                Forms\Components\TextInput::make('valor_referencia')
                                    ->label(__('Valor Referência'))
                                    ->required(),
                            ])->minItems(1)/*
                            ->deleteAction(
                                fn(ActionForm $action) => $action->requiresConfirmation(),
                            )

                            ->mutateRelationshipDataBeforeSaveUsing(function (array $data): array {
                                dd($data);
                                $data['user_id'] = auth()->id();

                                return $data;
                            })

                            //
                            ->addActionLabel('Adicionar')
                            ->grid(2)
                            ->columnSpanFull(),
                        */
                    ]),


            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('numero')
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
                    ->label(__('Tipo Lance'))
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
            ->headerActions([
                Tables\Actions\CreateAction::make()->label(__('Novo'))
                    ->modalHeading("Criar Lote {$this->getRecordTitle()}")
                /*
                ->mountUsing(function (Form $form) {
                    //dd($this->getOwnerRecord()->id);
                    $form->fill(['processo_id' => $this->getOwnerRecord()->id]);
                })
            */


            ])
            ->actions([
                Tables\Actions\EditAction::make()
                /*
                ->mountUsing(function (Form $form) {
                    //dd($this->getOwnerRecord()->id);
                    $form->fill(['processo_id' => $this->getOwnerRecord()->id]);
                })
                ->beforeFormFilled(function () {
                    $model = $this->getRecord()->lote();
                    dd($model->loteItens());
                    //dd($model);
                    //return $model->where('lote_id', $this->lote_id);
                })
                ->record(
                    function (){


                       //return $model->where('lote_id', $this->getModel());
                    }
                )
                ->form([
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->maxLength(255),
                    // ...
                ])
            */,
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])->emptyStateDescription('');;
    }
}
