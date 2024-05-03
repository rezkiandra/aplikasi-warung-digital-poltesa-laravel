<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductTabelSeller extends Component
{
  public $datas, $title;
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($datas, $title)
  {
    $this->datas = $datas;
    $this->title = $title;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.product-tabel-seller');
  }
}
