<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
  public $message, $icon, $type;
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($message = '', $icon = '', $type = '')
  {
    $this->message = $message;
    $this->icon = $icon;
    $this->type = $type;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.alert');
  }
}
