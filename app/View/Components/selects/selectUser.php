<?php

namespace App\View\Components\Selects;

use Illuminate\View\Component;

class SelectUser extends Component
{
    /**
     * JSON esperado do retorno da API:
     *
     *  [
     *      [
     *          'id'            => "...",
     *          'name'          => "...",
     *          'profile_photo' => "..."
     *      ],x
     *      ...
     *  ]
     */

    /**
     * @var string
     */
    public string $name, $api, $old;

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
