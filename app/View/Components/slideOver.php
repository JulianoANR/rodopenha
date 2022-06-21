<?php

namespace App\View\Components;

use Illuminate\View\Component;

class slideOver extends Component
{
    /**
     * @var string
     */
    public string $title;

    /**
     * @var string
     */
    public string $initialState;

    /**
     * @var string
     */
    public string $id;

    /**
     * @var string
     */
    public string $label;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $title = 'Slide over', $initialState = "false", $label = "null")
    {
        $this->id = $id;
        $this->label = $label;
        $this->title = $title;
        $this->initialState = $initialState;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.slide-over');
    }
}
