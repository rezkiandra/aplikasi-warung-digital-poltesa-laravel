<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BarGraphCard extends Component
{
  public $height, $title, $id;
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($height = '', $title, $id = '')
  {
    $this->height = $height;
    $this->title = $title;
    $this->id = $id;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.bar-graph-card');
  }
}
