<?php

namespace App\Livewire;

use Livewire\Attributes\Url;
use Livewire\Component;

class SearchRecipes extends Component
{
    #[Url(as : 'q')]
    public $query = '';
    public $results = [];

    public function render()
    {
        return view('livewire.search-recipes', [
            'results' => $this->results,
            'searchQuery' => $this->query,
        ]);
    }
}