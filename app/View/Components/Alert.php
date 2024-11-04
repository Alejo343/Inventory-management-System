<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    public $type;
    public $message;

    public function __construct($message = null)
    {
        // Determina el tipo de mensaje y el mensaje a mostrar
        if (session('success')) {
            $this->type = 'success';
            $this->message = session('success');
        } elseif (session('error')) {
            $this->type = 'danger';
            $this->message = session('error');
        } else {
            $this->type = null;
            $this->message = null;
        }
    }

    public function render()
    {
        return view('components.alert');
    }
}
