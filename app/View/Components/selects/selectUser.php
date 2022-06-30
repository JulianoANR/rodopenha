<?php

namespace App\View\Components\selects;

use Illuminate\View\Component;

class selectUser extends Component
{
    /**
     * @var string
     */
    public string $api;

    /**
     * @var string
     */
    public string $old;

    /**
     * @var string
     */
    public string $name;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($api, $name, $old = '0')
    {
        $this->api = $api;
        $this->name = $name;
        $this->old = $old;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.selects.select-user');
    }
}
