<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SidebarDropdown extends Component
{
  public $icon, $label, $active;
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($icon, $label, $active)
  {
    $this->icon = $icon;
    $this->label = $label;
    $this->active = $active;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.sidebar-dropdown');
  }
}
