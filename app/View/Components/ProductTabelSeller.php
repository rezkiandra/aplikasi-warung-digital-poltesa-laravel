<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductsTabelSeller extends Component
{
  public $datas, $fields, $title;
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($datas, $fields, $title)
  {
    $this->datas = $datas;
    $this->fields = $fields;
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
