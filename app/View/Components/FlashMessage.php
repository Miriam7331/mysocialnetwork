<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FlashMessage extends Component
{

    public $success;
    public $notice;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->success = session('success');
        $this->notice = session('notice');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.flash-message');
    }
}
