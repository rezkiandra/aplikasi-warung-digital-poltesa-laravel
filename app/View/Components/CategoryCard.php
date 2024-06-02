<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CategoryCard extends Component
{
  public $name, $icon;
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($name, $icon)
  {
    $this->name = $name;
    $this->icon = $icon;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.category-card');
  }
}
