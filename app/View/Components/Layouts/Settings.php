<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;

class Settings extends Component
{
    /**
     * @var string
     */
    public string $active, $activeClasses;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($active)
    {
        $this->active = $active;
        $this->activeClasses = 'bg-primary/10 text-primary hover:bg-primary/10 focus:bg-primary/20 dark:hover:bg-primary/10 dark:focus:bg-primary/20';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.settings');
    }
}
