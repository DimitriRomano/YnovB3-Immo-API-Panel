<?php

namespace App\View\Components\property;

use Illuminate\View\Component;

class form extends Component
{
    public $property;
    public $features;
    public $types;
    public $user;
    public $roles;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($property, $features, $types, $user, $roles)
    {
        $this->property = $property;
        $this->features = $features;
        $this->property = $property;
        $this->types = $types;
        $this->user = $user;
        $this->roles = $roles;

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
