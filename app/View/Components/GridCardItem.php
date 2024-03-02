<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GridCardItem extends Component
{
  public $title, $price, $image, $datas, $limit;
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($image, $title, $price, $datas, $limit = 30)
  {
    $this->image = $image;
    $this->title = $title;
    $this->price = $price;
    $this->datas = $datas;
    $this->limit = $limit;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.grid-card-item');
  }
}
