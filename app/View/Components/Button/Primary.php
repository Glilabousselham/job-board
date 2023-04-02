<?php

namespace App\View\Components\Button;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Primary extends Component
{

    private array $data;
    public function __construct(string $type = 'submit', string $value = '')
    {
        $this->data['value'] = $value;
        $this->data['type'] = $type;
    }


    public function render(): View|Closure|string
    {

        return view('components.button.primary', $this->data);
    }
}