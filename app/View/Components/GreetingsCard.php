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
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($greetings, $description, $label, $value, $actionLabel)
  {
    $this->greetings = $greetings;
    $this->description = $description;
    $this->label = $label;
    $this->value = $value;
    $this->actionLabel = $actionLabel;
    //
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
