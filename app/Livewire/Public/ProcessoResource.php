<?php

namespace App\Livewire\Public;

use App\Helpers\Util;
use App\Models\Modalidade;
use App\Models\Processo;
use App\Services\ProcessoView;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class ProcessoResource extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;
    use InteractsWithInfolists;

    public ?array $data = [];
    private Processo $processo;

    public function mount(Processo $processo): void
    {
        // $this->processo = $processo;
        // $this->form->fill($processo->toArray());
        // $this->form->fill();
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema(ProcessoView::schemaView());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema(ProcessoView::schemaForm())
            ->statePath('data');
    }

    public function create(): void
    {
        dd($this->form->getState());
    }


    public function table(Table $table): Table
    {
       // dd(Processo::query());
        return $table
            ->query(Processo::query())
            // ->heading('Listagem de Processos')
            //->description('')
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label(__('ID'))
                    ->sortable(),
                /*
                Tables\Columns\TextColumn::make('legislacao.descricao')
                    ->label(__('Legislação'))
                    ->limit(50)
                    ->sortable(),
                Tables\Columns\TextColumn::make('realizacao.nome')
                    ->label(__('Realização'))
                    ->limit(50)
                    ->sortable(),
                Tables\Columns\TextColumn::make('julgamento.nome')
                    ->limit(50)
                    ->sortable(),
                Tables\Columns\TextColumn::make('condutor.nome')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('autoridade.nome')
                    ->limit(50)
                    ->sortable(),

                Tables\Columns\TextColumn::make('promotor.nome')
                    ->limit(50)
                    ->sortable(),
                 */
                Tables\Columns\TextColumn::make('municipio.nome')
                    ->label(__('Município'))
                    ->limit(30)
                    ->sortable(),
                Tables\Columns\TextColumn::make('numero')
                    ->label(__('Número'))
                    ->limit(30)
                    ->searchable(),
                Tables\Columns\TextColumn::make('numero_edital')
                    ->label(__('Número Edital'))
                    ->limit(30)
                    ->searchable(),
                Tables\Columns\TextColumn::make('modalidade.nome')
                    ->limit(30)
                    ->sortable(),

                Tables\Columns\TextColumn::make('situacao')
                    ->label(__('Situação'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('data_inicio_proposta')
                    ->label(__('Disputa'))
                    ->date()
                    ->sortable(),
                /*
                Tables\Columns\TextColumn::make('taxa_administrativa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('modo_disputa')
                    ->limit(30)
                    ->searchable(),
                Tables\Columns\TextColumn::make('tipo_contrato')
                    ->limit(30)
                    ->searchable(),
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
                */
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('municipio')
                    ->label(__('Município'))
                    ->relationship('municipio', 'nome')
                    ->searchable()
                    ->preload(),

                Tables\Filters\Filter::make('numero_edital')
                    ->form([
                        TextInput::make('numero_edital')->label('Número Edital'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['numero_edital'],
                                fn(Builder $query, $date): Builder => $query->where('numero_edital', 'like', "%" . $date . "%")
                            );
                    }),
                Tables\Filters\SelectFilter::make('modalidade')
                    ->relationship('modalidade', 'nome')
                    ->searchable()
                    ->preload(),
                Tables\Filters\SelectFilter::make('situacao')
                    ->label("Situação")
                    ->options(Util::situacaoProcesso())
                    ->searchable(),
            ], layout: Tables\Enums\FiltersLayout::AboveContent)
            // ->filtersFormColumns(3)
            //->filtersFormWidth(MaxWidth::FourExtraLarge)
            ->actions([
                Tables\Actions\Action::make('Ver')
                    ->url(fn(Processo $record): string => route('processo.detail', $record))
                    ->icon('heroicon-m-eye')
                    ->iconButton()
                    ->button()
                    ->color('info')
                    ->labeledFrom('xl')
                    ->openUrlInNewTab(),
                /*
                                Tables\Actions\ViewAction::make() // or EditAction
                                ->form(ProcessoView::schema())
                                    // ->modalSubmitAction(false)
                                    // ->closeModalByClickingAway(false)
                                    //  ->slideOver()
                                    ->label("Ver")
                                    ->icon('heroicon-m-eye')
                                    ->iconButton()
                                    ->button()
                                    ->labeledFrom('xl'),
                */
            ], position: Tables\Enums\ActionsPosition::BeforeColumns)
            ->bulkActions([
                // ...
            ])
            ->striped()
            ->defaultSort('id', 'asc')
            ->paginated([10, 25, 50, 100, 'all']);
    }

    public function render()
    {
        return view('livewire.public.processo-list')->extends('components.layouts.app')
            ->section('content');
    }
}
