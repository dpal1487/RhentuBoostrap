<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Coupon;

class CouponLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchCoupon;
    public function render()
    {
        $searchCoupon = '%' . $this->searchCoupon . '%';

        return view('livewire.coupon-livewire', [
            'coupons' => Coupon::where('code', 'like', $searchCoupon)
                ->orWhere('descriptions', 'like', $searchCoupon)
                ->orWhere('type', 'like', $searchCoupon)
                ->orWhere('discount','like',$searchCoupon)
                ->paginate(10)
                ->onEachSide(1),
        ]);
    }
}
