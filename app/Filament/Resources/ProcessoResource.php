<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProcessoResource\Pages;
use App\Filament\Resources\ProcessoResource\RelationManagers;
use App\Helpers\Util;
use App\Models\Julgamento;
use App\Models\Legislacao;
use App\Models\Modalidade;
use App\Models\Municipio;
use App\Models\Participante;
use App\Models\Processo;
use App\Models\Promotor;
use App\Models\Realizacao;
use Filament\Forms\Components\Actions\Action as ActionForm;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Leandrocfe\FilamentPtbrFormFields\Money;
use Leandrocfe\FilamentPtbrFormFields\PhoneNumber;

class ProcessoResource extends Resource
{
    protected static ?string $model = Processo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Processo';
    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::End;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make('DADOS DO PROCESSO')
                    ->schema([
                            Grid::make(4)->schema([

                                TextInput::make('numero')
                                  ->numeric(),

                                Textarea::make('objetivo')
                                    ->required()
                                    ->columnSpan(2)
                                    ->hint(fn ($state, $component) => 'limite: ' .  $component->getMaxLength() - strlen($state)  . ' caracteres')
                                    ->maxlength(500)
                                    ->reactive(),

                                Textarea::make('observacao')
                                    ->label(__('Observação'))
                                    ->columnSpan(2)
                                    ->hint(fn ($state, $component) => 'limite: ' . $component->getMaxLength() - strlen($state)  . ' caracteres')
                                    ->maxlength(255)
                                    ->reactive(),

                            ]),
                        ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('numero')
                    ->label(__('Número'))
                    ->searchable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                /* Action::make('Relatorio')
                     ->url(fn (ProcessoRelatorio $record): string => route('/{record}/report', $record))
                     ->openUrlInNewTab()
                */
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
            /*
            RelationGroup::make('Anexos', [
                RelationManagers\ProcessoDocumentoRelationManager::class,
                RelationManagers\ProcessoArquivoRelationManager::class,
            ]),
            RelationManagers\LoteRelationManager::make([
                'status' => 'approved',
            ]),
            */

        ];
    }

    public static function getRecordSubNavigation(Page $page): array
    {
       // $page->setPropertyAttribute("class",'hidden w-52 flex-col gap-y-7 md:flex');

        return $page->generateNavigationItems([
            Pages\EditProcesso::class,
            RelationManagers\ArquivoRelationManager::class,
            RelationManagers\LoteRelationManager::class,

        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProcessos::route('/'),
            'create' => Pages\CreateProcesso::route('/create'),
            'edit' => Pages\EditProcesso::route('/{record}/edit'),
            'arquivo' => RelationManagers\ArquivoRelationManager::route('/{record}/arquivo'),
            'lote' => RelationManagers\LoteRelationManager::route('/{record}/lote'),
        ];
    }
}
