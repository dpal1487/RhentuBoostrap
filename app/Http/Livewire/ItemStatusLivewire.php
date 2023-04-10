<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ItemStatus;

class ItemStatusLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $q;
    public $status;
    public function render()
    {


        $q = '%' . $this->q . '%';
        $ItemStatuss = new ItemStatus();
        if (!empty($this->q)) {
            $ItemStatuss = $ItemStatuss->where('text', 'like', $q)->orWhere('description', 'like', $q)->orWhere('label' , 'like' , $q);
        }
        return view('livewire.item-status-livewire', ['ItemStatuss' => $ItemStatuss->paginate(10)->onEachSide(1)]);


    }
}
