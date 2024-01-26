<div>
    <div class="grid grid-flow-col gap-3">
        <div class="col-span-1">
            <livewire:menu-processo :id="$id"/>
        </div>
        <div class="col-span-4">
            <x-filament::section
                icon="heroicon-o-document-text"
                icon-color="info"
            >
                <x-slot name="heading">
                    Arquivo do Processo
                </x-slot>
                <div class="px-5 py-5">
                    {{ ($this->table) }}
                </div>
            </x-filament::section>
        </div>
    </div>
</div>
