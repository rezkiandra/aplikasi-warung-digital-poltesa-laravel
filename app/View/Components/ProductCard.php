<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductCard extends Component
{
	public $datas, $icon, $variant, $label, $class, $condition, $percentage, $action;
	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct($datas, $icon, $variant, $label, $class = '', $condition, $percentage = '', $action = '')
	{
		$this->datas = $datas;
		$this->icon = $icon;
		$this->variant = $variant;
		$this->label = $label;
		$this->class = $class;
		$this->condition = $condition;
		$this->percentage = $percentage;
    $this->action = $action;
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
