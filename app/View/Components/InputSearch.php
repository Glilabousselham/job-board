<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputSearch extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $queries = [];

        if (request()->user()) {
            $queries = request()->user()->jobSearches()->latest()->limit(10)->get();
        }
        return view('components.input-search', compact('queries'));
    }
}