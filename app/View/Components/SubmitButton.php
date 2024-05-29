<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SubmitButton extends Component
{
  public $class, $label, $id, $variant, $type, $icon;
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($label = '', $class = '', $id = '', $variant, $type, $icon = '')
  {
    $this->label = $label;
    $this->class = $class;
    $this->id = $id;
    $this->variant = $variant;
    $this->type = $type;
    $this->icon = $icon;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.submit-button');
  }
}
