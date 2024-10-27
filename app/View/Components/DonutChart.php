<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DonutChart extends Component
{
    /**
     * Create a new component instance.
    */
    public $options_json;
    public function __construct(
        public $title,
        public $options,
    )
    {
        $this->options_json = json_encode($options);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.donut-chart');
    }
}
