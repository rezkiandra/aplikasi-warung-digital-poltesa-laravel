<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Pagination extends Component
{
  public $pages;
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($pages = '')
  {
    $this->pages = $pages;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.pagination');
  }
}
