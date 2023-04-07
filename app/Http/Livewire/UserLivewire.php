<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
class UserLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchUser;
    public function render()
    {
        $searchUser = '%' . $this->searchUser . '%';
        return view('livewire.user-livewire', [
            'result' => User::where('first_name', 'like', $searchUser)
                ->orWhere('last_name', 'like', $searchUser)
                ->orWhere('email', 'like', $searchUser)
                ->orWhere('mobile', 'like', $searchUser)
                ->paginate(10)
                ->onEachSide(1),
        ]);
    }
}
