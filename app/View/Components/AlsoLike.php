<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AlsoLike extends Component
{
    public $mightAlsoLike;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($mightAlsoLike)
    {
        $this->mightAlsoLike = $mightAlsoLike;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.also-like');
    }
}
