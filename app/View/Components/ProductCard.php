<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductCard extends Component
{
  public $datas, $icon, $variant, $label, $class, $condition, $percentage, $action, $description;
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($datas, $icon, $variant, $label, $class = '', $condition, $percentage = '', $action = '', $description = 'Analitik produk minggu ini')
  {
    $this->datas = $datas;
    $this->icon = $icon;
    $this->variant = $variant;
    $this->label = $label;
    $this->class = $class;
    $this->condition = $condition;
    $this->percentage = $percentage;
    $this->action = $action;
    $this->description = $description;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.product.product-card');
  }
}
