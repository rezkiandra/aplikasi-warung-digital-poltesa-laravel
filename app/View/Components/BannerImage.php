<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BannerImage extends Component
{
  public $image, $title, $class, $aos;
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($image, $title, $class = '', $aos = '')
  {
    $this->image = $image;
    $this->title = $title;
    $this->class = $class;
    $this->aos = $aos;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.banner-image');
  }
}
