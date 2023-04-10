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
    public $searchStatus;

    public function render()
    {
        $searchPlan = '%' . $this->searchPlan . '%';



        // return view('livewire.plan-livewire', [
        //     'plans' => Plan::where('name','like' ,$searchPlan ?? '' )
        //                     ->orWhere('description','like' , $searchPlan ?? '')
        //                     ->orWhere('price','like' , $searchPlan ?? '')
        //                     ->when($this->searchStatus , function($query , $searchStatus)
        //                     {
        //                         return $query->where('is_active' , $searchStatus);
        //                     })
        //                     ->paginate(10)
        //                     ->onEachSide(1)
        // ]);
        // return view('livewire.plan-livewire', [
        //     'plans' => Plan::where('is_active' , $this->searchStatus ?? '')
        //                     ->paginate(10)
        //                     ->onEachSide(1)
        // ]);


        if ($this->searchStatus == '') {
            $plans = Plan::where('name', 'like', $searchPlan)
                ->orWhere('description', 'like', $searchPlan)
                ->orWhere('price', 'like', $searchPlan)
                ->paginate(10)
                ->onEachSide(1);
            return view('livewire.plan-livewire', ['plans' => $plans]);
        }elseif ($this->searchStatus == 1) {
            $plans = Plan::where('is_active', '=', 1)

                ->paginate(10)
                ->onEachSide(1);
            return view('livewire.plan-livewire', ['plans' => $plans]);
        } elseif ($this->searchStatus == 0) {
            $plans = Plan::where('is_active', '=', 0)

                ->paginate(10)
                ->onEachSide(1);
            return view('livewire.plan-livewire', ['plans' => $plans]);
        }
    }
}
