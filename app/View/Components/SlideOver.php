<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SlideOver extends Component
{
    /**
     * @var string
     */
    public string $initialState, $id, $title, $label;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $id,
        $label = "null",
        $title = 'Slide over',
        $initialState = false
    )
    {
        $this->id = $id;
        $this->label = $label;
        $this->title = $title;
        $this->initialState = $initialState === true ? 'true' : 'false';
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
