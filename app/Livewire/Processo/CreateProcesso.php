<?php

namespace App\Livewire\Processo;

use App\Models\ProcessoRequerimentoImpugnacao;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class CreateProcesso extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('processo_id')
                    ->relationship('processo', 'id')
                    ->required(),
                Forms\Components\TextInput::make('nome_razao_social')
                    ->required()
                    ->maxLength(180),
                Forms\Components\TextInput::make('cpf_cnpj')
                    ->required()
                    ->maxLength(18),
                Forms\Components\TextInput::make('cep')
                    ->maxLength(10),
                Forms\Components\TextInput::make('telefone')
                    ->tel()
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(80),
                Forms\Components\Textarea::make('descricao')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('nome_arquivo')
                    ->maxLength(200),
                Forms\Components\TextInput::make('status')
                    ->maxLength(50),
                Forms\Components\Textarea::make('resposta')
                    ->columnSpanFull(),
                Forms\Components\DateTimePicker::make('data_resposta'),
                Forms\Components\TextInput::make('nome_arquivo_resposta')
                    ->maxLength(200),
            ])
            ->statePath('data')
            ->model(ProcessoRequerimentoImpugnacao::class);
    }

    public function create(): void
    {
        $data = $this->form->getState();

        $record = ProcessoRequerimentoImpugnacao::create($data);

        $this->form->model($record)->saveRelationships();
    }

    public function render(): View
    {
        return view('livewire.processo.create-processo');
    }
}