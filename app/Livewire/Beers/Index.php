<?php

namespace App\Livewire\Beers;

use Livewire\Component;
use Livewire\WithPagination;
use App\Services\BeerService;

class Index extends Component
{
    use WithPagination;

    public $sortBy = '';

    public $sortDirection = 'asc';

    public $filters = [];

    public function sort(string $field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }

        $this->resetPage();
    }

  public function filter()
    {
        $this->validate([
            'filters.name' => 'nullable|string|min:3|max:255',
            'filters.property' => 'nullable|in:abv,ibu,ebc,ph,volume',
            'filters.operator' => 'required_with:filters.property|in:=,>,<,>=,<=',
            'filters.value' => 'required_with:filters.property|numeric',
        ]);

        $this->resetPage();
    }


    public function render(BeerService $beerService)
    {
        return view('livewire.beers.index', [
            'beers' => $beerService->getBeers(
                $this->sortBy,
                $this->sortDirection,
                $this->filters
            )
        ]);
    }
}
