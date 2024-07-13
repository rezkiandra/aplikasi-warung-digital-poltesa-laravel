<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DropdownNavItem extends Component
{
  public $name, $route;
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($name, $route)
  {
    $this->name = $name;
    $this->route = $route;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.dropdown-nav-item');
  }
}
