<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\NotificationType;

class NotificationTypeLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchNotification;
    public function render()
    {
        $searchNotification = '%' . $this->searchNotification . '%';
        return view('livewire.notification-type-livewire', [
            'notificationtypes' => NotificationType::where('label', 'like', $searchNotification)
                ->orWhere('description', 'like', $searchNotification)
                ->paginate(10)
                ->onEachSide(1),
        ]);
    }
}
