<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Page;

class PageLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $q;
    public $status;
    public function render()
    {
        $q = '%' . $this->q . '%';
        $pages = new Page();
        if (!empty($this->q)) {
            $pages = $pages->where('title', 'like', $q)
                ->orWhere('heading', 'like', $q);
        } elseif ($this->status != null) {
            $pages = $pages->where('status', '=', intval($this->status));
        }
        return view('livewire.page-livewire', ['pages' => $pages->paginate(10)->onEachSide(1)]);


    }
}
