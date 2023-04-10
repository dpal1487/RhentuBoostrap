<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ReportType;

class ReportTypeLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchReport;
    public function render()
    {
        $searchReport = '%' . $this->searchReport . '%';
        return view('livewire.report-type-livewire', [
            'reporttypes' => ReportType::where('title', 'like', $searchReport)
                ->orWhere('description', 'like', $searchReport)
                ->paginate(10)
                ->onEachSide(1),
        ]);
    }
}
