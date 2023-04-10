<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ItemStatus;

class ItemStatusLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchItemStatus;
    public function render()
    {
        $searchItemStatus = '%' . $this->searchItemStatus . '%';
        return view('livewire.item-status-livewire', [
            'ItemStatuss' => ItemStatus::where('text', 'like', $searchItemStatus)
                ->orWhere('label', 'like', $searchItemStatus)
                ->orWhere('description', 'like', $searchItemStatus)
                ->paginate(10)
                ->onEachSide(1),
        ]);
    }
}
