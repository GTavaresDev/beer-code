<?php

namespace App\Livewire\Beers;

use Livewire\Component;
use App\Livewire\Forms\BeerForm;
use App\Models\Beer;

class Update extends Component
{
    public BeerForm $beerForm;
    public Beer $beer;

    public function mount(Beer $beer)
    {
        $this->beer = $beer;

        // Preenche o form com os dados da cerveja
        $this->beerForm->setBeer($beer);
    }

    public function save()
    {
        $this->beerForm->update($this->beer);

        return redirect()
            ->route('beers.index')
            ->success("{$this->beerForm->name} atualizada com sucesso!");
    }

    public function render()
    {
        return view('livewire.beers.update');
    }
}
