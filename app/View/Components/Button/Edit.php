<?php

namespace App\View\Components\Button;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Edit extends Component
{

    private array $data;
    public function __construct(string $type = 'submit', string $value = '')
    {
        $this->data['value'] = $value;
        $this->data['type'] = $type;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button.edit',$this->data);
    }
}