<?php

namespace App\View\Components;

use Illuminate\View\Component;

class plantilla extends Component
{
    //Declaramos una variable que queremos que esté disponible dentro de nuestra vista
    public $titulo;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($titulo = 'Default')
    {
        $this->titulo = $titulo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.plantilla');
    }
}
