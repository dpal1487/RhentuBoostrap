<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Plan;

class PlanLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $q;
    public $status;

    public function render()
    {
        $q = '%' . $this->q . '%';
        $plans = new Plan();

        if (!empty($this->q)) {
            $plans = $plans->where('name', 'like', $q)->orWhere('description', 'like', $q)->orWhere('price', 'like', $q);
        } elseif ($this->status != null) {
            $plans = $plans->where('is_active', '=', intval($this->status));
        }
        return view('livewire.plan-livewire', ['plans' => $plans->paginate(10)->onEachSide(1)]);


    }
}
