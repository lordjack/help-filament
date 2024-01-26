<?php

namespace App\Livewire\Public;

use App\Models\Lote;
use App\Models\LoteItens;
use App\Services\LoteView;
use Filament\Tables\Actions\Action;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Infolists\Infolist;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Livewire\Component;
use Illuminate\Http\Request;

class LoteDetails extends Component implements HasForms, HasInfolists, HasTable
{
    use InteractsWithTable;
    use InteractsWithInfolists;
    use InteractsWithForms;

    private Lote $lote;
    public $data = [];
    public $processo_id;
    public $lote_id;
    public $lotes;
    public $count;

    public function mount(Request $request): void
    {
        $this->processo_id = $request->route()->processo_id;
        $query = Lote::where("processo_id", $this->processo_id);

        $this->lotes = $query->get();
        $this->lote = $query->first();
        $this->count = $query->count();

        if (!$request->route()->lote_id) {
            $this->loteItens = LoteItens::where("lote_id", $this->lote->id)->get();
            $this->lote_id = $this->lote->id;

        } else {
            $this->lote_id = $request->route()->lote_id;
            $this->lote = Lote::findOrFail($this->lote_id);
            $this->loteItens = LoteItens::where("lote_id", $this->lote_id)->get();
        }

        $this->form->fill($this->lote->toArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema(LoteView::schemaForm())
            ->statePath('data')
            ->model($this->lote);
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->record($this->lote)
            ->schema(LoteView::schemaView());
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                function (LoteItens $model) {
                    return $model->where('lote_id', $this->lote_id);
                }
            )
            ->heading('Itens')
            ->columns([
                TextColumn::make('id')
                    ->label(__('ID'))
                    ->sortable(),
                TextColumn::make('numero')
                    ->label(__('Número'))
                    ->limit(30)
                    ->sortable(),
                TextColumn::make('especificacao')
                    ->label(__('Especificação'))
                    ->limit(30)
                    ->searchable(),
                TextColumn::make('unidade')
                    ->label(__('Unidade'))
                    ->limit(30)
                    ->searchable(),
                TextColumn::make('quantidade')
                    ->label(__('Quantidade'))
                    ->limit(30)
                    ->sortable(),
            ])
            ->filters([

            ], layout: FiltersLayout::AboveContent)
            ->actions([

            ], position: ActionsPosition::BeforeColumns)
            ->bulkActions([
                // ...
            ])
            ->striped()
            ->defaultSort('id', 'asc')
            ->paginated([10, 25, 50, 100, 'all']);
    }


    public function render()
    {
        return view('livewire.public.lote-details',
            ['id' => $this->lote->processo_id, 'lotes' => $this->lotes, "count" => $this->count])->extends('components.layouts.app')
            ->section('content');
    }
}
