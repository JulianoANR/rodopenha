<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Activated item in navbar
     * @var array|string
     */
    public array|string $active;

    /**
     * @var string
     */
    public string $activeClasses;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($active)
    {
        gettype($active) == 'string' ? $this->active = ['item' => $active] : $this->active = $active;
        $this->activeClasses = 'bg-white/5 xl:text-primary xl:bg-gray-50 dark:bg-white/5 dark:text-white';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.navbar');
    }
}
