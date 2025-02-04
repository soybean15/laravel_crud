<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CustomSelect extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $attribute,
        public $label,
        public $value=null,
        public $options =[]
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.custom-select');
    }
}
