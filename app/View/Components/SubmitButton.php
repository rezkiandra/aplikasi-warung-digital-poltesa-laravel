<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SubmitButton extends Component
{
  public $label;
  public $type;
  public $variant;
  public $class;
  public $icon;
  public $id;
  /**
   * Create a new component instance.
   */
  public function __construct($label = 'Submit', $type, $variant, $class = '', $icon = '', $id = '')
  {
    $this->label = $label;
    $this->type = $type;
    $this->variant = $variant;
    $this->class = $class;
    $this->icon = $icon;
    $this->id = $id;
  }

  /**
   * Get the view / contents that represent the component.
   */
  public function render()
  {
    return view('components.submit-button');
  }
}
