<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category as CategoryModel;

class Category extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $q;
    public $status;

    public function render()
    {

        $categories = new CategoryModel();

        if (!empty($this->q)) {
            $categories = $categories->where('name', 'like', '%' . $this->q . '%');
        } elseif ($this->status != null) {
            $categories = $categories->where('status', '=' , intval($this->status));
        }
        return view('livewire.category', (['categories' => $categories->paginate(10)->onEachSide(1)]));

    }
}
