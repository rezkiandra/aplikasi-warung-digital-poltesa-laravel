<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DetailCard extends Component
{
  public $title, $description, $count, $icon, $variant, $countDescription;
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($title, $description = '', $count, $icon, $variant, $countDescription)
  {
    $this->title = $title;
    $this->description = $description;
    $this->count = $count;
    $this->icon = $icon;
    $this->variant = $variant;
    $this->countDescription = $countDescription;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.detail-card');
  }
}
