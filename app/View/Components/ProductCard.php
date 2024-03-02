<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductCard extends Component
{
	public $datas, $icon, $variant, $label, $growth, $class, $condition;
	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct($datas, $icon, $variant, $label, $growth, $class = '', $condition)
	{
		$this->datas = $datas;
		$this->icon = $icon;
		$this->variant = $variant;
		$this->label = $label;
		$this->growth = $growth;
		$this->class = $class;
		$this->condition = $condition;
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
