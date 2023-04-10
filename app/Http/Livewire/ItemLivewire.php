<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Item;

class ItemLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchCategory;
    public function render()
    {
        $searchCategory = '%' . $this->searchCategory . '%';
        return view('livewire.item-livewire', [
            'item' => Item::where('name', 'like', $searchCategory)
                ->orWhere('name', 'like', $searchCategory)
                ->paginate(3)
                ->onEachSide(1),
        ]);
    }
}
