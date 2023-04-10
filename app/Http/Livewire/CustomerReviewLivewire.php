<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CustomerReview;

class CustomerReviewLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchCustomer;
    public $status;

    public function render()
    {
        $searchCustomer = '%' . $this->searchCustomer . '%';

        $reviews = CustomerReview::join('users', 'customer_reviews.user_id', '=', 'users.id')
            ->join('reviews', 'customer_reviews.review_id', '=', 'reviews.id')
            ->where('users.first_name', 'like', $searchCustomer)
            ->orWhere('users.last_name', 'like', $searchCustomer)
            ->orWhere('title', 'like', $searchCustomer)
            ->orWhere('content', 'like', $searchCustomer)
            ->orWhere('rating', 'like', $searchCustomer);

        // if ($this->status != null) {
        //     $reviews = $reviews->where('status', '=', intval($this->status));

        // }

        return view('livewire.customer-review-livewire', ['reviews' => $reviews->paginate(10)->onEachSide(1)]);
    }
}
