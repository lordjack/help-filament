<?php

namespace App\Livewire\Processo;

use App\Models\Processo;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class EditProcesso extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public Processo $record;

    public function mount(): void
    {
        $this->form->fill($this->record->attributesToArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('legislacao_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('modalidade_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('realizacao_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('julgamento_id')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('promotor_id')
                    ->relationship('promotor', 'id')
                    ->required(),
                Forms\Components\Select::make('municipio_id')
                    ->relationship('municipio', 'id')
                    ->required(),
                Forms\Components\Select::make('condutor_id')
                    ->relationship('condutor', 'id')
                    ->required(),
                Forms\Components\Select::make('autoridade_id')
                    ->relationship('autoridade', 'id')
                    ->required(),
                Forms\Components\TextInput::make('numero')
                    ->required()
                    ->maxLength(150),
                Forms\Components\TextInput::make('tipo_contrato')
                    ->maxLength(80),
                Forms\Components\TextInput::make('taxa_administrativa')
                    ->maxLength(20),
                Forms\Components\TextInput::make('modo_disputa')
                    ->maxLength(40),
                Forms\Components\TextInput::make('tempo_inicial'),
                Forms\Components\TextInput::make('tempo_final'),
                Forms\Components\TextInput::make('ano_referencia')
                    ->numeric(),
                Forms\Components\TextInput::make('mensagem')
                    ->maxLength(20),
                Forms\Components\TextInput::make('exclusivo_me')
                    ->maxLength(20),
                Forms\Components\TextInput::make('exclusivo_regional')
                    ->maxLength(20),
                Forms\Components\TextInput::make('exclusivo_local')
                    ->maxLength(20),
                Forms\Components\TextInput::make('cadastro_reserva')
                    ->maxLength(20),
                Forms\Components\TextInput::make('inversao_fase')
                    ->maxLength(20),
                Forms\Components\TextInput::make('valor_total_processo')
                    ->numeric(),
                Forms\Components\TextInput::make('telefone_promotor')
                    ->tel()
                    ->maxLength(40),
                Forms\Components\TextInput::make('email_promotor')
                    ->email()
                    ->maxLength(120),
                Forms\Components\Textarea::make('objetivo')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('observacao')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('cotas')
                    ->maxLength(10),
                Forms\Components\TextInput::make('tratamento_diferenciado')
                    ->maxLength(50),
                Forms\Components\TextInput::make('intervalo_min_lance')
                    ->maxLength(10),
                Forms\Components\TextInput::make('tipo_intervalo_lance')
                    ->maxLength(10),
                Forms\Components\TextInput::make('valor_intervalo_lance')
                    ->numeric(),
                Forms\Components\TextInput::make('itens_lote')
                    ->maxLength(10),
                Forms\Components\TextInput::make('orcamento_sigiloso')
                    ->maxLength(10),
                Forms\Components\TextInput::make('numero_processo_externo')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('numero_processo_interno')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('garantia_contratual')
                    ->maxLength(10),
                Forms\Components\TextInput::make('casa_decimal_valores')
                    ->maxLength(40),
                Forms\Components\TextInput::make('casa_decimal_quantidade')
                    ->maxLength(40),
                Forms\Components\DatePicker::make('data_inicio_proposta'),
                Forms\Components\TextInput::make('hora_inicio_proposta'),
                Forms\Components\DatePicker::make('data_limite_impugnacao'),
                Forms\Components\TextInput::make('hora_limite_impugnacao'),
                Forms\Components\DatePicker::make('data_limite_esclarecimento'),
                Forms\Components\TextInput::make('hora_limite_esclarecimento'),
                Forms\Components\DatePicker::make('data_final_proposta'),
                Forms\Components\TextInput::make('hora_final_proposta'),
                Forms\Components\TextInput::make('situacao')
                    ->maxLength(40),
            ])
            ->statePath('data')
            ->model($this->record);
    }

    public function edit(): void
    {
        $data = $this->form->getState();

        $this->record->update($data);
    }

    public function render(): View
    {
        return view('livewire.processo.edit-processo');
    }
}