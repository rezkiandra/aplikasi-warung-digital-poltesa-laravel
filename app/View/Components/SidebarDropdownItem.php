<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SidebarDropdownItem extends Component
{
  public $href, $label, $active;
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($href, $label, $active)
  {
    $this->href = $href;
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
    return view('components.sidebar-dropdown-item');
  }
}
