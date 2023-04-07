<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Attribute;

class AttributeLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchAttribute;

    public function render()
    {
        $searchAttribute = '%'.$this->searchAttribute.'%';
        return view('livewire.attribute-livewire',[
            'attributes' => Attribute::where('name','like', $searchAttribute)->paginate(10)->onEachSide(1)
        ]);
    }
}
