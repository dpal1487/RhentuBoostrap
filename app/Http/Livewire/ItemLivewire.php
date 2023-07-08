<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Item;
use App\Models\ItemStatus;
use App\Http\Resources\ItemResource;

class ItemLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchCategory;
    public $q;
    public $status;

    public function render()
    {
        $title = 'Item Details';
        // $data = User::find($id);

        $itemStatus = ItemStatus::all();

        $item = new Item();
        if ($this->q) {
            $item = $item->where('name', 'like', "%{$this->q}%");
        } elseif ($this->status != null) {
            $item = $item->where('status_id', '=', intval($this->status));
        }
        $item = $item
            ->paginate(2)
            ->onEachSide(1)
            ->appends(request()->query());

        return view('livewire.item-livewire', ['itemstatus' => $itemStatus, 'items' => ItemResource::collection($item)]);
    }
}
