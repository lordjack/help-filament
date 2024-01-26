<?php

namespace App\Filament\Resources\ProcessoResource\RelationManagers;

use App\Filament\Resources\ProcessoResource;
use App\Models\Municipio;
use Filament\Forms;
use Filament\Forms\Components\Actions\Action as ActionForm;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\ManageRelatedRecords;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class ArquivoRelationManager extends ManageRelatedRecords
{
    protected static string $resource = ProcessoResource::class;

    protected static string $relationship = 'processoArquivo';
    // protected ?string $subheading = 'Anexo dos arquivos disponíveis ao processo ex: Edital etc...';
    protected static ?string $modelLabel = 'Arquivo';
    protected static ?string $pluralLabel = 'Arquivos';
    protected static ?string $navigationIcon = 'heroicon-o-document';

    public function getTitle(): string|Htmlable
    {
        return "Arquivo {$this->getRecordTitle()}";
    }

    public static function getNavigationLabel(): string
    {
        return "Arquivo ";
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('titulo')
                    ->required()
                    ->maxLength(255)
                    ->distinct(),
                FileUpload::make('nome_arquivo')
                    ->acceptedFileTypes(['application/pdf'])
                    ->openable()
                    ->downloadable()
                    ->minSize(10)
                    ->maxSize(55024)
                    ->directory('processo_arquivo')
                    ->preserveFilenames()
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('titulo')
            ->columns([
                Tables\Columns\TextColumn::make('titulo')
                ->searchable()
                ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label("Novo")
                    ->modalHeading("Criar Arquivo {$this->getRecordTitle()}")
                    ->modalDescription('Anexo dos arquivos disponíveis ao processo ex: Edital etc...')
                ,
            ])
            ->actions([
                Action::make('pdf')
                    ->label('PDF')
                    ->color('danger')
                    ->icon('heroicon-s-arrow-down-tray')
                    ->url(fn($record) => Storage::url($record->nome_arquivo))
                    ->openUrlInNewTab(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
