<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CustomerReviews extends Component
{
    /**
     * Create a new component instance.
     */

    public $customerreviews;

    public function __construct($customerreviews)
    {
        $this->customerreviews = $customerreviews;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.customer-reviews');
    }
}
