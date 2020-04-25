<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TextInput extends Component
{
    /**
     * Server key for the input.
     *
     * @var string
     */
    public $key;

    /**
     * User friendly label of the input field
     *
     * @var string
     */
    public $label;

    /**
     * Create the component instance.
     *
     * @param  string  $key
     * @param  string  $label
     * @return void
     */
    public function __construct($key, $label)
    {
        $this->key = $key;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.text-input');
    }
}
