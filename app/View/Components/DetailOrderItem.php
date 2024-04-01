<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DetailOrderItem extends Component
{
  public $label, $icon, $class, $condition, $variant;
  public function __construct($label, $icon, $class = '', $condition, $variant)
  {
    $this->label = $label;
    $this->icon = $icon;
    $this->class = $class;
    $this->condition = $condition;
    $this->variant = $variant;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.detail-order-item');
  }
}
