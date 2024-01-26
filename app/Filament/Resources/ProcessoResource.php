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

    protected static string $view = 'filament.resources.pages.sub-navigation.sidebar';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make('DADOS DO PROCESSO')
                    ->schema([
                        Group::make()->schema([
                            Grid::make(4)->schema([

                                Select::make('autoridade_id')
                                    ->label(__('Autoridade'))
                                    ->options(Participante::all()->pluck('nome', 'id'))
                                    ->searchable()
                                    ->required(),
                                TextInput::make('numero_edital')
                                    ->label(__('Número Edital'))
                                    ->required()
                                    ->maxLength(50),
                                TextInput::make('numero')
                                    ->label(__('Número do Processo Administrativo'))
                                    ->required()
                                    ->maxLength(150),

                                TextInput::make('ano_referencia')
                                    ->label(__('Ano Referência'))
                                    ->numeric(),

                            ]),
                        ]),
                        Group::make()->schema([
                            Grid::make(4)->schema([

                                Select::make('legislacao_id')
                                    ->label(__('Legislação'))
                                    ->options(Legislacao::all()->pluck('descricao', 'id'))
                                    ->searchable()
                                    ->required(),
                                Select::make('municipio_id')
                                    ->label(__('Município'))
                                    ->options(Municipio::all()->pluck('nome', 'id'))
                                    ->searchable()
                                    ->required(),
                                Select::make('condutor_id')
                                    ->label(__('Condutor'))
                                    ->options(Participante::all()->pluck('nome', 'id'))
                                    ->searchable()
                                    ->required(),
                                Select::make('promotor_id')
                                    ->label(__('Promotor'))
                                    ->options(Promotor::all()->pluck('nome', 'id'))
                                    ->searchable()
                                    ->required(),

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
                                    ->reactive()
                            ]),
                        ]),

                    ])
                    ->collapsible()
                    ->persistCollapsed(), //an persist whether a section is collapsed in local storage


                Section::make('DADOS DE CONTRATO ')
                    ->schema([
                        Grid::make(4)->schema([
                            TextInput::make('tipo_contrato')
                                ->maxLength(80),
                        ]),
                    ])
                    ->collapsible()
                    ->persistCollapsed(), //an persist whether a section is collapsed in local storage

                Section::make('PRAZOS')
                    ->schema([
                        Grid::make(4)->schema([

                            TextInput::make('tipo_intervalo_lance')
                                ->maxLength(10),
                            TextInput::make('intervalo_min_lance')
                                ->maxLength(10),
                            Money::make('valor_intervalo_lance'),
                            DatePicker::make('data_inicio_proposta')
                                ->label(__('Data Início Proposta')),
                            TextInput::make('hora_inicio_proposta')
                                ->label(__('Hora Início Proposta'))
                                ->mask('99:99')
                                ->placeholder('00:00')
                                ->maxLength(5),
                            DatePicker::make('data_limite_impugnacao')
                                ->label(__('Data Limite Impugnação')),
                            TextInput::make('hora_limite_impugnacao')
                                ->label(__('Hora Limite Impugnação'))
                                ->mask('99:99')
                                ->placeholder('00:00')
                                ->maxLength(5),
                            DatePicker::make('data_limite_esclarecimento'),
                            TextInput::make('hora_limite_esclarecimento')
                                ->mask('99:99')
                                ->placeholder('00:00')
                                ->maxLength(5),
                            DatePicker::make('data_final_proposta'),
                            TextInput::make('hora_final_proposta')
                                ->mask('99:99')
                                ->placeholder('00:00')
                                ->maxLength(5),

                            TextInput::make('tempo_inicial')
                                ->label(__('Tempo Inícial')),
                            TextInput::make('tempo_final')
                                ->label(__('Tempo Final')),

                        ]),
                    ])
                    ->collapsible()
                    ->persistCollapsed(), //an persist whether a section is collapsed in local storage


                Section::make('DADOS DE DISPUTA')
                    ->schema([
                        Grid::make(4)->schema([
                            TextInput::make('modo_disputa')
                                ->maxLength(40),
                            TextInput::make('tempo_inicial')
                                ->label(__('Tempo Inícial')),
                            TextInput::make('tempo_final')
                                ->label(__('Tempo Final')),
                            TextInput::make('casa_decimal_valores')
                                ->maxLength(40),
                            TextInput::make('casa_decimal_quantidade')
                                ->maxLength(40),
                            Money::make('valor_total_processo'),
                            TextInput::make('taxa_administrativa')
                                ->maxLength(20),
                        ]),
                    ])
                    ->collapsible()
                    ->persistCollapsed(), //an persist whether a section is collapsed in local storage


                Section::make('OUTROS')
                    ->schema([
                        Grid::make(4)->schema([

                            Select::make('modalidade_id')
                                ->label(__('Modalidade'))
                                ->options(Modalidade::all()->pluck('nome', 'id'))
                                ->searchable()
                                ->required(),
                            Select::make('realizacao_id')
                                ->label(__('Realização'))
                                ->options(Realizacao::all()->pluck('nome', 'id'))
                                ->searchable()
                                ->required(),
                            Select::make('julgamento_id')
                                ->label(__('Julgamento'))
                                ->options(Julgamento::all()->pluck('nome', 'id'))
                                ->searchable()
                                ->required(),


                            TextInput::make('inversao_fase')
                                ->label(__('Inversão Fase'))
                                ->maxLength(20),

                            PhoneNumber::make('telefone_promotor')
                                ->format('(99) 99999-9999')
                                ->placeholder('(99) 99999-9999')
                                ->maxLength(40),
                            TextInput::make('email_promotor')
                                ->email()
                                ->placeholder('email@exemplo.com')
                                ->maxLength(120),


                            TextInput::make('cotas')
                                ->maxLength(10),
                            TextInput::make('tratamento_diferenciado')
                                ->maxLength(50),

                            TextInput::make('orcamento_sigiloso')
                                ->label(__('Orçamento Sigiloso'))
                                ->maxLength(10),
                            TextInput::make('numero_processo_externo')
                                ->label(__('Número Processo Externo'))
                                ->required()
                                ->maxLength(50),
                            TextInput::make('numero_processo_interno')
                                ->label(__('Número Processo Interno'))
                                ->required()
                                ->maxLength(50),
                            TextInput::make('garantia_contratual')
                                ->maxLength(10),

                            Select::make('situacao')
                                ->label(__('Situação'))
                                ->options(Util::situacaoProcesso())
                                ->searchable(),

                        ]),
                    ])
                    ->collapsible()
                    ->persistCollapsed(), //an persist whether a section is collapsed in local storage

                Grid::make(2)->schema([
                    Section::make('OPÇÕES DO PROCESSO')
                        ->schema([
                            Grid::make(2)->schema([
                                Checkbox::make('mensagem')
                                    ->label(__("Mensagem")),
                                Checkbox::make('cadastro_reserva')
                                    ->label(__("Cadastro Reserva")),
                            ]),
                        ])
                        ->columnSpan(['lg' => 1]),

                    Section::make('OPÇÕES DE PROPOSTA')
                        ->schema([
                            Grid::make(2)->schema([

                                Checkbox::make('exclusivo_me')
                                    ->label('Exclusivo ME'),
                                Checkbox::make('exclusivo_regional')
                                    ->label('Exclusivo Regional'),
                                Checkbox::make('exclusivo_local')
                                    ->label('Exclusivo Local'),
                            ]),
                        ])
                        ->columnSpan(['lg' => 1]),
                ]),

                Section::make('Origem dos Recursos')
                    ->schema([
                        CheckboxList::make('origemRecurso')
                            ->relationship('origemRecurso', 'nome')
                            ->label(__(''))
                            ->columns(2)
                            ->bulkToggleable(),
                    ]),

                /*
                Section::make('Regionalidade')
                    ->description('Município(s) que pode(m) participar do processo')
                    ->schema([
                        Select::make('regionalidade')
                            ->label(__('Município(s)'))
                            ->relationship('regionalidade', 'nome')
                            ->multiple()
                            ->required()
                            ->preload()
                        ,
                    ]),
                */
                /*
                                Section::make('Documentos')
                                    ->description('Documentos necessários para participação')
                                    ->schema([
                                        Repeater::make('Documentos')
                                            ->relationship('processoDocumento')->label(" ")
                                            ->schema([
                                                TextInput::make('titulo')->label("Nome")
                                                    ->required()
                                                    ->maxLength(255)
                                                    ->distinct(),
                                                  FileUpload::make('nome_documento')
                                                      ->acceptedFileTypes(['application/pdf'])
                                                      ->openable()
                                                      ->downloadable()
                                                      ->minSize(10)
                                                      ->maxSize(55024)
                                                      ->directory('processo_documento')
                                                      ->preserveFilenames()
                                                      ->nullable()
                            ])
                            ->deleteAction(
                                fn(ActionForm $action) => $action->requiresConfirmation(),
                            )
                            ->minItems(1)
                            ->addActionLabel('Adicionar')
                            ->grid(2)
                            ->columnSpanFull(),
                    ]),
                */

                /*
                Section::make('Arquivos')
                    ->description('Anexo dos arquivos disponíveis ao processo ex: Edital etc...')
                    ->schema([
                        Repeater::make('Arquivos')
                            ->relationship('processoArquivo')->label("")
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
                            ])
                            ->deleteAction(
                                fn(ActionForm $action) => $action->requiresConfirmation(),
                            )
                            //->minItems(1)
                            ->addActionLabel('Adicionar')
                            ->grid(2)
                            ->columnSpanFull(),
                    ]),
                */


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('legislacao.descricao')
                    ->label(__('Legislação'))
                    ->limit(50)
                    ->sortable(),
                Tables\Columns\TextColumn::make('modalidade.nome')
                    ->limit(50)
                    ->sortable(),
                Tables\Columns\TextColumn::make('realizacao.nome')
                    ->label(__('Realização'))
                    ->limit(50)
                    ->sortable(),
                Tables\Columns\TextColumn::make('situacao')
                    ->label(__('Situação'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('julgamento.nome')
                    ->limit(50)
                    ->sortable(),
                Tables\Columns\TextColumn::make('promotor.nome')
                    ->limit(50)
                    ->sortable(),
                Tables\Columns\TextColumn::make('municipio.nome')
                    ->label(__('Município'))
                    ->limit(50)
                    ->sortable(),
                Tables\Columns\TextColumn::make('condutor.nome')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('autoridade.nome')
                    ->limit(50)
                    ->sortable(),
                Tables\Columns\TextColumn::make('numero')
                    ->label(__('Número'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('tipo_contrato')
                    ->searchable(),
                Tables\Columns\TextColumn::make('taxa_administrativa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('modo_disputa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tempo_inicial')
                    ->label(__('Tempo Inícial')),
                Tables\Columns\TextColumn::make('tempo_final'),
                Tables\Columns\TextColumn::make('ano_referencia')
                    ->label(__('Ano Referência'))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('intervalo_min_lance')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tipo_intervalo_lance')
                    ->searchable(),
                Tables\Columns\TextColumn::make('valor_intervalo_lance')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('itens_lote')
                    ->searchable(),
                Tables\Columns\TextColumn::make('orcamento_sigiloso')
                    ->label(__('Orçamento Sigiloso'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('numero_processo_externo')
                    ->label(__('Número Processo Externo'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('numero_processo_interno')
                    ->label(__('Número Processo Interno'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('casa_decimal_valores')
                    ->label(__('Casa Décimal Valores'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('casa_decimal_quantidade')
                    ->label(__('Casa Décimal Quantidade'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('data_inicio_proposta')
                    ->label(__('Data Início Proposta'))
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('hora_inicio_proposta')
                    ->label(__('Hora Início Proposta')),
                Tables\Columns\TextColumn::make('data_limite_impugnacao')
                    ->label(__('Data Limite Impugnação'))
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('hora_limite_impugnacao')
                    ->label(__('Hora Limite Impugnação')),
                Tables\Columns\TextColumn::make('data_limite_esclarecimento')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('hora_limite_esclarecimento'),
                Tables\Columns\TextColumn::make('data_final_proposta')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('hora_final_proposta'),

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
            RelationManagers\DocumentoRelationManager::class,
            RelationManagers\ProcessoRelatorioRelationManager::class,
          //  RelationManagers\RegionalidadeRelationManager::class,

        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProcessos::route('/'),
            'create' => Pages\CreateProcesso::route('/create'),
            'edit' => Pages\EditProcesso::route('/{record}/edit'),
            'report' => RelationManagers\ProcessoRelatorioRelationManager::route('/{record}/report'),
            'arquivo' => RelationManagers\ArquivoRelationManager::route('/{record}/arquivo'),
            'lote' => RelationManagers\LoteRelationManager::route('/{record}/lote'),
            'documento' => RelationManagers\DocumentoRelationManager::route('/{record}/documento'),
         //   'regionalidade' => RelationManagers\RegionalidadeRelationManager::route('/{record}/regionalidade'),
        ];
    }
}
