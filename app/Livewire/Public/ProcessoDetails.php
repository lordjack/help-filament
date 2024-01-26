<?php

namespace App\Livewire\Public;

use App\Helpers\Util;
use App\Models\Modalidade;
use App\Models\Processo;
use App\Services\ProcessoView;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Infolists\Infolist;
use Livewire\Component;
use Illuminate\Http\Request;

class ProcessoDetails extends Component implements HasForms, HasInfolists
{
    use InteractsWithInfolists;
    use InteractsWithForms;

    private Processo $processo;
    public ?array $data = [];

    public function mount(Request $request): void
    {
        $this->processo = Processo::find($request->route()->id);
        // dd($this->processo );
        $this->form->fill($this->processo->toArray());
        // $this->fill($this->processo);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema(ProcessoView::schemaForm())
            ->statePath('data')
            ->model($this->processo);
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->record($this->processo)
            //->schema([TextEntry::make('numero'),]);
            ->schema(ProcessoView::schemaView());
    }


    public function render()
    {
        return view('livewire.public.processo-details',
            ['id' => $this->processo->id])->extends('components.layouts.app')
            ->section('content');
    }
}
