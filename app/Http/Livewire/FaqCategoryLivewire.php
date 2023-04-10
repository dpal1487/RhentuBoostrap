<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\FAQsCategory;

class FaqCategoryLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $q;
    public $status;
    public function render()
    {

        $faqs = new FAQsCategory();

        if (!empty($this->q)) {
            $faqs = $faqs->where('title', 'like', '%' . $this->q . '%');
        } elseif ($this->status != null) {
            $faqs = $faqs->where('status', '=', intval($this->status));
        }
        return view('livewire.faq-category-livewire', ['faqs' => $faqs->paginate(10)->onEachSide(1)]);

    }
}
