<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DropdownItem extends Component
{
	public $label;
	public $variant;
	public $route;
	public $icon;
	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct($label, $variant, $route = '', $icon)
	{
		$this->label = $label;
		$this->variant = $variant;
		$this->route = $route;
		$this->icon = $icon;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|\Closure|string
	 */
	public function render()
	{
		return view('components.dropdown-item');
	}
}
