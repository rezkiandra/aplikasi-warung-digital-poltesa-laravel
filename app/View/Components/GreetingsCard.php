<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GreetingsCard extends Component
{
  public $greetings;
  public $description;
  public $label;
  public $value;
  public $actionLabel;
  public $route;
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($greetings, $description, $label, $value, $actionLabel, $route)
  {
    $this->greetings = $greetings;
    $this->description = $description;
    $this->label = $label;
    $this->value = $value;
    $this->actionLabel = $actionLabel;
    $this->route = $route;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.greetings-card');
  }
}
