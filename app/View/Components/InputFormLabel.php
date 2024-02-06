<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputFormLabel extends Component
{
  public string $label;
  public string $type;
  public string $name;
  public string $placeholder;
  public string $value;

  /**
   * Create a new component instance.
   */
  public function __construct($label, $name, $type, $placeholder = "", $value)
  {
    $this->label = $label;
    $this->name = $name;
    $this->type = $type;
    $this->placeholder = $placeholder;
    $this->value = $value;
  }

  /**
   * Get the view / contents that represent the component.
   */
  public function render(): View|Closure|string
  {
    return view('components.input-form-label');
  }
}
