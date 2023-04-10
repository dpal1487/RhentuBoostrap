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


    public function render()
    {


        $title = "Item Details";
        // $data = User::find($id);

        $itemStatus = ItemStatus::all();

        $item = new Item();
        if($this->q){
            $item = $item->where('name','like',"%{$this->q}%");
        }
        $item = $item->paginate(2)->onEachSide(1)->appends(request()->query());


        // $item = Item::paginate(2)->onEachSide(1);


        return view('livewire.item-livewire' , [ 'itemstatus' => $itemStatus , 'items' => ItemResource::collection($item)]);

        // $searchCategory = '%' . $this->searchCategory . '%';
        // return view('livewire.item-livewire', [
        //     'item' => Item::where('name', 'like', $searchCategory)
        //         ->orWhere('name', 'like', $searchCategory)
        //         ->paginate(3)
        //         ->onEachSide(1),
        // ]);
    }
}
