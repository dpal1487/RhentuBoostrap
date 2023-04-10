<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\FAQsCategory;

class FaqCategoryLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchFaqCategory;
    public function render()
    {
        $searchFaqCategory = '%'.$this->searchFaqCategory.'%';
        return view('livewire.faq-category-livewire',[
            'faqs' => FAQsCategory::where('title','like', $searchFaqCategory)->paginate(10)->onEachSide(1)
        ]);
    }
}
