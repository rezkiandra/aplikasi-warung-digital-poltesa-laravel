<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductSwiper extends Component
{
  public $datas;
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($datas)
  {
    $this->datas = $datas;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.product-swiper');
  }
}
