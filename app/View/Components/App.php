<?php

namespace App\View\Components;

use Illuminate\View\Component;

class App extends Component
{
    /**
     * The page title
     *
     * @var string
     */
    public string $title;

    /**
     * Activated item in navbar
     *
     * @var array
     */
    public array $active;

    /**
     * Style activated item
     *
     * @var string
     */
    public string $activeClasses;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = 'default', $active = [])
    {
        $this->title = $title;

        gettype($active) == 'string'
            ? $this->active = ['item' => $active]
            : $this->active = $active;

        $this->activeClasses = 'bg-white/5 xl:text-primary xl:bg-gray-50 dark:bg-white/5 dark:text-white';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.app');
    }
}
