<?php

namespace App\Http\Livewire;

use App\Models\Banner as BannerModel;
use Livewire\WithPagination;
use Livewire\Component;

class Banner extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $q;
    public $status;
    public function render()
    {
        $banners = new BannerModel();

        if (!empty($this->q)) {
            $banners = $banners->where('title', 'like', '%' . $this->q . '%')->orWhere('description', 'like', '%' . $this->q . '%');
        } elseif ($this->status != null) {
            $banners = $banners->where('status', '=', intval($this->status));
        }

        return view('livewire.banner', ['banners' => $banners->paginate(10)->onEachSide(1)]);

        // if ($this->searchStatus == '') {
        //     $banners = BannerModel::where('title', 'like', $searchBanner)
        //         ->orWhere('description', 'like', $searchBanner)
        //         ->paginate(10)
        //         ->onEachSide(1);
        //     return view('livewire.banner', ['banners' => $banners]);
        // } elseif ($this->searchStatus == 1) {
        //     $banners = BannerModel::where('status', '=', 1)
        //         ->paginate(10)
        //         ->onEachSide(1);
        //     return view('livewire.banner', ['banners' => $banners]);
        // } elseif ($this->searchStatus == 0) {
        //     $banners = BannerModel::where('status', '=', 0)
        //         ->paginate(10)
        //         ->onEachSide(1);
        //     return view('livewire.banner', ['banners' => $banners]);
        // }
    }
}
