<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GraphCardContent extends Component
{
  public $label, $value, $icon, $variant;
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($label, $value, $icon, $variant)
  {
    $this->label = $label;
    $this->value = $value;
    $this->icon = $icon;
    $this->variant = $variant;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.graph-card-content');
  }
}
