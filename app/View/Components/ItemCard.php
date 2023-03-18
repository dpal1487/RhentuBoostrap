<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ItemCard extends Component
{
    /**
     * Create a new component instance.
     */

     public $item;
    //  public $itemstatus;
    public function __construct( $item )
    {
        $this->item = $item;
        // $this->itemstatus = $itemstatus;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.item-card');
    }
}
