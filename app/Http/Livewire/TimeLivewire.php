<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Time;
class TimeLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchTime;
    public function render()
    {
        $searchTime = '%' . $this->searchTime . '%';
        return view('livewire.time-livewire', [
            'times' => Time::where('title', 'like', $searchTime)
                ->orWhere('description', 'like', $searchTime)
                ->paginate(10)
                ->onEachSide(1),
        ]);
    }
}
