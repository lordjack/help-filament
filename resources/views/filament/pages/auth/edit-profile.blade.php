<div>
    <header class="fi-header flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>

            <h1 class="fi-header-heading text-2xl font-bold tracking-tight text-gray-950 dark:text-white sm:text-3xl">
                Informações Usuario
            </h1>

        </div>

    </header>
    <x-filament-panels::form wire:submit="save">
        {{$this->form}}

    <x-filament-panels::form.actions
        :actions="$this->getCachedFormActions()"
        :full-width="$this->hasFullWidthFormActions()"
        alignment="right"
    />
    </x-filament-panels::form>
</div>
