<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EarningsCard extends Component
{
  public $title, $earnings, $description, $class;
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($title, $earnings = 0, $description, $class = '')
  {
    $this->title = $title;
    $this->earnings = $earnings;
    $this->description = $description;
    $this->class = $class;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.earnings-card');
  }
}
