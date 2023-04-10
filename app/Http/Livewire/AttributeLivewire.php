<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Attribute;

class AttributeLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $q;
    public $status;

    public function render()
    {
        // $searchAttribute = '%' . $this->searchAttribute . '%';

        $attributes = new Attribute();

        if (!empty($this->q)) {
            $attributes = $attributes->where('name', 'like', '%' . $this->q . '%');
        } elseif ($this->status != null) {
            $attributes = $attributes->where('status', '=', intval($this->status));
        }
        return view('livewire.attribute-livewire', ['attributes' => $attributes->paginate(10)->onEachSide(1)]);

    }
}
