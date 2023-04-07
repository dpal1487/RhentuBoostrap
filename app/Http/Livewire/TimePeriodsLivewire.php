<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Attribute;
class TimePeriodsLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchCategory;
    public function render()
    {
        $searchCategory = '%'.$this->searchCategory.'%';
        return view('livewire.time-periods-livewire',[
            'categories' => CategoryModel::where('name','like', $searchCategory)->paginate(10)->onEachSide(1)
        ]);
    }
}
