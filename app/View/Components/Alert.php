<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{

    public $color;

    public $message;

    public $width;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($color, $width, $message)
    {
        $this->color = $color;
        $this->width = $width;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
