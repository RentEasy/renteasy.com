<?php

namespace App\View\Components\Inputs;

use Illuminate\View\Component;

class Dropdown extends Component
{
    public $key;
    public $label;
    public $options = [];
    public $value;

    /**
     * Create the component instance.
     *
     * @param string $key
     * @param string $label
     * @param string $value
     */
    public function __construct($key, $label, $options, $value = null)
    {
        $this->key = $key;
        $this->label = $label;
        $this->options = $options;
        $this->value = $value ?? old($key);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.inputs.dropdown');
    }
}
