<?php

namespace App\View\Components\Inputs;

use Illuminate\View\Component;

class Text extends Component
{
    public $key;

    public $label;

    public $value;

    /**
     * Create the component instance.
     *
     * @param string $key
     * @param string $label
     * @param string $value
     */
    public function __construct($key, $label, $value = null)
    {
        $this->key = $key;
        $this->label = $label;
        $this->value = $value ?? old($key);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.inputs.text');
    }
}
