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
        $searchAttribute = '%' . $this->searchAttribute . '%';
        return view('livewire.attribute-livewire', [
            'attributes' => Attribute::join('categories', 'attributes.category_id', '=', 'categories.id')
                ->where('attributes.name', 'like', $searchAttribute)
                ->orWhere('data_type', 'like', $searchAttribute)
                ->orWhere('field', 'like', $searchAttribute)
                ->orWhere('categories.name', 'like', $searchAttribute)
                ->select('*' ,'attributes.name as attributename' ,'categories.name as categoryname' )
                ->paginate(10)
                ->onEachSide(1),
        ]);
    }
}
