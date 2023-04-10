<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Page;

class PageLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchPage;
    public function render()
    {
        $searchPage = '%' . $this->searchPage . '%';

        return view('livewire.page-livewire', [
            'pages' => Page::where('title', 'like', $searchPage)
                ->orWhere('heading', 'like', $searchPage)
                ->orWhere('heading', 'like', $searchPage)
                ->paginate(10)
                ->onEachSide(1),
        ]);
    }
}
