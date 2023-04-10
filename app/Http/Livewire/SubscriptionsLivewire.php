<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Subscription;
class SubscriptionsLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchSubscription;
    public function render()
    {
        $searchSubscription = '%' . $this->searchSubscription . '%';

        $result = Subscription::join('users', 'subscriptions.user_id', '=', 'users.id')
                ->join('plans', 'subscriptions.plan_id', '=', 'plans.id')
                ->where('order_id', 'like', $searchSubscription)
                ->orWhere('payment_id', 'like', $searchSubscription)
                ->orWhere('quantity', 'like', $searchSubscription)
                ->orWhere('first_name', 'like', $searchSubscription)
                ->orWhere('plans.name', 'like', $searchSubscription)
                ->orWhere('last_name', 'like', $searchSubscription)
                ->paginate(10)
                ->onEachSide(1);

        return view('livewire.subscriptions-livewire', ['result' =>$result ]);
    }
}
