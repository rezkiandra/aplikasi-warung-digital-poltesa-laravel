<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ActionButton extends Component
{
	public $route, $icon, $variant;
	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct($route, $icon, $variant)
	{
		$this->route = $route;
		$this->icon = $icon;
		$this->variant = $variant;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|\Closure|string
	 */
	public function render()
	{
		return view('components.action-button');
	}
}
