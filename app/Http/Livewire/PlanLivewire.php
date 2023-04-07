<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Plan;

class PlanLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchPlan;
    public function render()
    {
        $searchPlan = '%' . $this->searchPlan . '%';
        return view('livewire.plan-livewire', [
            'plans' => Plan::where('name', 'like', $searchPlan)
                ->orWhere('description', 'like', $searchPlan)
                ->orWhere('price', 'like', $searchPlan)
                ->paginate(10)
                ->onEachSide(1),
        ]);
    }
}
