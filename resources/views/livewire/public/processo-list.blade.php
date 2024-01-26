<div>
    <x-filament::section
        icon="heroicon-o-document-text"
        icon-color="info"
    >
        <x-slot name="heading">
            Listagem de Processos
        </x-slot>

        <div >
            {{ $this->table }}
        </div>

    </x-filament::section>

</div>
