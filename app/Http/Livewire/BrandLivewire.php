<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Brand;

class BrandLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchBrand;

    public function render()
    {
        $searchBrand = '%' . $this->searchBrand . '%';
        return view('livewire.brand-livewire', [
            'brands' => Brand::join('categories' ,'categories.id' ,'=' , 'brands.category_id')
            ->where('brands.name', 'like', $searchBrand)
                ->orWhere('brands.description', 'like', $searchBrand)
                ->orWhere('categories.name', 'like', $searchBrand)
                ->select('*' ,'brands.name as brandsname' ,'brands.description as brandsdescription' ,'categories.name as categoryname' )

                ->paginate(10)
                ->onEachSide(1),
        ]);
    }
}
