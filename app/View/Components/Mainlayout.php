<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Mainlayout extends Component
{
    public string $title;

    public function __construct(string $title = 'Default')
    {
        $this->title = $title;
    }

    public function render()
    {
        return view('components.mainlayout');
    }
}