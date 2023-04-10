<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Enquirie;

class EnquireLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchEnquire;
    public function render()
    {
        $searchEnquire = '%' . $this->searchEnquire . '%';

        return view('livewire.enquire-livewire', [
            'result' => Enquirie::where('name', 'like', $searchEnquire)
                ->orWhere('mobile', 'like', $searchEnquire)
                ->orWhere('email','like', $searchEnquire)
                ->orWhere('message','like', $searchEnquire)
                ->paginate(10)
                ->onEachSide(1),
        ]);
    }
}
