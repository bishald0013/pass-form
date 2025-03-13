<?php

namespace App\View\Components;

use Closure;
use DateTimeZone;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CreatePass extends Component
{
    public $passType;
    public $organizer;
    public $timezone;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->passType = ['Generic Pass', 'Event Pass'];
        $this->organizer = "Lets Calendar";
        $this->timezone = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.create-pass');
    }
}
