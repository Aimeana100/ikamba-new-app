<?php

namespace App\View\Components;

use App\Models\Ads;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdsCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $middle_active_ads = Ads::where('position', 'MIDDLE')->where('status', 1)->first();

        return view('components.ads-card', compact('middle_active_ads'));
    }
}
