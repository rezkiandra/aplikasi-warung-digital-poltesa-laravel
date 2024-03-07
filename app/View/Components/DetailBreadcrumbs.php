<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DetailBreadcrumbs extends Component
{
  public $id, $created;
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($id, $created)
  {
    $this->id = $id;
    $this->created = $created;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.detail-breadcrumbs');
  }
}
