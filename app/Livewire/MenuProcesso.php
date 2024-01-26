<?php

namespace App\Livewire;

use Livewire\Component;

class MenuProcesso extends Component
{

    public $id;

    public function mount($id = null)
    {
        $this->id = $id;
    }
    public function render()
    {
        return view('livewire.menu-processo')->extends('components.layouts.app')
            ->section('menu');
    }
}
