<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\TimePeriod;
class TimePeriodsLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchTimePeriods;
    public function render()
    {
        $searchTimePeriods = '%' . $this->searchTimePeriods . '%';
        return view('livewire.time-periods-livewire', [
            'categories' => TimePeriod::join('times', 'times.id', '=', 'time_periods.time_id')
                ->join('categories', 'categories.id', '=', 'time_periods.category_id')
                ->where('title', 'like', $searchTimePeriods)
                ->orWhere('name', 'like', $searchTimePeriods)
                ->orWhere('categories.description', 'like', $searchTimePeriods)
                ->paginate(10)
                ->onEachSide(1),
        ]);
    }
}
