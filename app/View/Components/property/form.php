<?php

namespace App\View\Components\property;

use Illuminate\View\Component;

class form extends Component
{
    public $property;
    public $features;
    public $types;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($property, $features, $types)
    {
        $this->features = $features;
        $this->property = $property;
        $this->types = $types;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */

    public function render()
    {
        return view('components.property.form');
    }
}
