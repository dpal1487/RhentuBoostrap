<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Attribute;

class FaqsLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchFaqs;
    public function render()
    {
        $searchFaqs = '%'.$this->searchFaqs.'%';

        return view('livewire.faqs-livewire',[
            'categories' => CategoryModel::where('name','like', $searchFaqs)->paginate(10)->onEachSide(1)
        ]);
    }
}
