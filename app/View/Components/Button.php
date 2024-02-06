<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
  public $type;
  public $variant;
  public $class;
  /**
   * Create a new component instance.
   */
  public function __construct($type, $variant, $class = '')
  {
    $this->type = $type;
    $this->variant = $variant;
    $this->class = $class;
  }

  /**
   * Get the view / contents that represent the component.
   */
  public function render(): View|Closure|string
  {
    return view('components.button');
  }
}
