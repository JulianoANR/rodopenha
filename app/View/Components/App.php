<?php

namespace App\View\Components;

use Illuminate\View\Component;

class App extends Component
{
    /**
     * @var string
     */
    public string $title;

    /**
     * @var array|string
     */
    public array|string $active;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = 'default', $active = [])
    {
        $this->title = $title;
        $this->active = $active;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('app');
    }
}
