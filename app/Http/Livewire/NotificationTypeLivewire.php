<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\NotificationType;

class NotificationTypeLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $q;
    public $status;
    public function render()
    {
        $q = '%' . $this->q . '%';
        $notificationtypes = new NotificationType();
        if (!empty($this->q)) {
            $notificationtypes = $notificationtypes->where('label', 'like', $q)->orWhere('description', 'like', $q)->orWhere('slug' , 'like' , $q);
        } elseif ($this->status != null) {
            $notificationtypes = $notificationtypes->where('status', '=', intval($this->status));
        }
        return view('livewire.notification-type-livewire', ['notificationtypes' => $notificationtypes->paginate(10)->onEachSide(1)]);
    }
}
