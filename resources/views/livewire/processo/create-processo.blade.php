<div>
    <form wire:submit="create">
        Processo
        {{ $this->form }}

        <button type="submit">
            Salvar
        </button>
    </form>

    <x-filament-actions::modals />
</div>
