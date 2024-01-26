<?php

namespace App\Livewire\Public;

use App\Models\ProcessoArquivo;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Tables\Actions\Action;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Http\Request;

class ArquivoDetails extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    private ProcessoArquivo $arquivo;
    public $data = [];
    public $processo_id;

    public function mount(Request $request): void
    {
        $this->processo_id = $request->route()->processo_id;
       // dd($this->processo_id);
        // $this->form->fill($this->arquivo->toArray());
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                function (ProcessoArquivo $model) {
                    return $model->where('processo_id', $this->processo_id);
                }
            )
            ->columns([
              /*  TextColumn::make('id')
                    ->label(__('ID'))
                    ->sortable(),
              */
                TextColumn::make('titulo')
                    ->label(__('Nome Arquivo'))
                    ->limit(30)
                    ->sortable(),
                TextColumn::make('nome_arquivo')
                    ->label(__('PDF'))
                    ->limit(30)
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label(__('Criado em'))
                    ->dateTime()
                    ->limit(30)
                    ->searchable(),
            ])
            ->filters([

            ], layout: FiltersLayout::AboveContent)
            ->actions([
                Action::make('pdf')
                    ->label('PDF')
                    ->color('danger')
                    ->icon('heroicon-s-arrow-down-tray')
                    ->url(fn ($record) => Storage::url($record->nome_arquivo))
                    ->openUrlInNewTab(),
            ], position: ActionsPosition::BeforeColumns)
            ->bulkActions([
                // ...
            ])
            ->striped()
            ->defaultSort('id', 'asc')
            ->paginated([10, 25, 50, 100, 'all']);
    }

    public function report(ProcessoArquivo $record)
    {
        return Pdf::loadView('pdf', ['record' => $record])
            ->download($record->nome_arquivo. '.pdf');
    }


    public function render()
    {
        return view('livewire.public.arquivo-details',
            ['id' => $this->processo_id,])->extends('components.layouts.app')
            ->section('content');
    }
}
