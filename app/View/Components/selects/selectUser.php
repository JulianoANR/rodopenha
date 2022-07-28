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
     *      ],
     *      ...
     *  ]
     */

    /**
     * @var string
     */
    public string $name, $api, $value, $formatted;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($api, $name, $value = 'null')
    {
        $this->api = $api;
        $this->name = $name;
        $this->value = $value !== '' ? $value : 'null';

        $this->formatted = isset($name) ? str_replace(']', '', str_replace('[', '.', $name)) : false;
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
