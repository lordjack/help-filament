<?php

namespace App\Filament\Resources\ProcessoResource\RelationManagers;

use App\Filament\Resources\ProcessoResource;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Pages\ManageRelatedRecords;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Facades\Storage;

class ProcessoRelatorioRelationManager extends ManageRelatedRecords
{
    protected static string $resource = ProcessoResource::class;

    protected static string $relationship = 'processoRelatorio';

    protected static ?string $modelLabel = 'Relatório';
    protected static ?string $pluralLabel = 'Relatórios';
    protected static ?string $navigationIcon = 'heroicon-o-document';

    public function getTitle(): string | Htmlable
    {
        return "Relatório {$this->getRecordTitle()}";
    }

    public static function getNavigationLabel(): string
    {
        return "Relatório ";
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('titulo')
                    ->required()
                    ->maxLength(180),
                FileUpload::make('nome_arquivo')
                    ->acceptedFileTypes(['application/pdf'])
                    ->openable()
                    ->downloadable()
                    ->minSize(10)
                    ->maxSize(55024)
                    ->directory('processo_relatorio')
                    ->preserveFilenames()
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('titulo')
            ->columns([
                Tables\Columns\TextColumn::make('titulo')
                ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('Criado'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()->label("Novo"),

            ])
            ->actions([
                Tables\Actions\Action::make('pdf')
                    ->label('PDF')
                    ->color('danger')
                    ->icon('heroicon-s-arrow-down-tray')
                    ->url(fn ($record) => Storage::url($record->nome_arquivo))
                    ->openUrlInNewTab(),
                Tables\Actions\EditAction::make(),

                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DissociateBulkAction::make(),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
