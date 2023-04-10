<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Time;
class TimeLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $q;
    public $status;
    public function render()
    {
        $q = '%' . $this->q . '%';
        $times = new Time();
        if (!empty($this->q)) {
            $times = $times->where('title', 'like', $q)->orWhere('description', 'like', $q);
        } elseif ($this->status != null) {
            $times = $times->where('status', '=', intval($this->status));
        }

        return view('livewire.time-livewire', ['times' => $times->paginate(10)->onEachSide(1)]);
    }
}
