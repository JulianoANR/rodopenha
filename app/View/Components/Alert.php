<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public $status;
    public $msg;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($status, $msg)
    {
        $this->msg    = ucfirst($msg);

        if ($status == 'success') {
            $this->status = 'green';
        } else if ($status == 'danger') {
            $this->status = 'red';
        } else if ($status == 'warning') {
            $this->status = 'yellow';
        } else {
            $this->status = 'gray';
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layouts.alert');
    }
}
