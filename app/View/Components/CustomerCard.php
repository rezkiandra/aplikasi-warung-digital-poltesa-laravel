<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CustomerCard extends Component
{
	public $datas, $label, $icon, $variant, $description, $percentage, $condition;
	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct($datas, $label, $icon, $variant, $condition = '', $percentage = '', $description = 'Last week analytics')
	{
		$this->datas = $datas;
		$this->label = $label;
		$this->icon = $icon;
		$this->variant = $variant;
		$this->condition = $condition;
		$this->percentage = $percentage;
		$this->description = $description;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|\Closure|string
	 */
	public function render()
	{
		return view('components.customer.customer-card');
	}
}
