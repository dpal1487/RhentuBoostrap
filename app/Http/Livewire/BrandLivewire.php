<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Brand;

class BrandLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $q;
    public $status;

    public function render()
    {
        $q = '%' . $this->q . '%';
        $brands = new Brand();

        if (!empty($this->q)) {
            $brands = $brands->where('name', 'like', $q)->orWhere('description', 'like', $q);
        } elseif ($this->status != null) {
            $brands = $brands->where('status', '=', intval($this->status));
        }
        return view('livewire.brand-livewire', ['brands' => $brands->paginate(10)->onEachSide(1)]);

    }
}
