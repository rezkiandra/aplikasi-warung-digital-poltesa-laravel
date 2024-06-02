<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TopCustomersCard extends Component
{
  public $datas, $title, $class;
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($datas = '', $title, $class = '')
  {
    $this->datas = $datas;
    $this->title = $title;
    $this->class = $class;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.top-customers-card');
  }
}
