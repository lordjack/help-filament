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
                    Lotes do Processo
                </x-slot>
                <div class="px-5 py-5">
                    {{ $this->form }}
                </div>
                <div class="px-5 py-5">
                    Lote Nº<br>
                    @for ($i = 0; $i < $count ; $i++)
                        <x-filament::link :href="url('lote/'.$id.'/'.$lotes[$i]->id)">
                            <x-filament::badge color="warning">
                                {{$i+1}}
                            </x-filament::badge>
                        </x-filament::link>
                    @endfor
                </div>
                <div class="px-5 py-5">
                    {{ ($this->table) }}
                </div>
            </x-filament::section>
        </div>
    </div>
</div>
