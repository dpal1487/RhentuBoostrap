<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ItemCartStatus extends Component
{
    /**
     * Create a new component instance.
     */

     public $itemid;
    public function __construct($itemid)
    {
        $this->itemid = $itemid;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.item-cart-status');
    }
}
