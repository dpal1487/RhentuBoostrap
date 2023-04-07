<?php

namespace App\Http\Livewire;

use App\Models\Banner as BannerModel;
use Livewire\WithPagination;
use Livewire\Component;

class Banner extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchBanner;
    public function render()
    {
        $searchBanner = '%' . $this->searchBanner . '%';

        return view('livewire.banner' , [
            'banners' => BannerModel::where('title','like',$searchBanner)->orWhere('description','like',$searchBanner)->paginate(10)->onEachSide(1)
        ]);
    }
}
