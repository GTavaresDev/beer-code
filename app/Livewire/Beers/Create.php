<?php

namespace App\Livewire\Beers;

use Livewire\Component;
use App\Livewire\Forms\BeerForm;

class Create extends Component
{
    public BeerForm $beerForm;

    public function save()
    {
        $this->beerForm->store();

        return redirect()
            ->route('beers.index')
            ->success("{$this->beerForm->name} criada com sucesso!");
    }

    public function render()
    {
        return view('livewire.beers.create');
    }
}
