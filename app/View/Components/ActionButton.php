<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ActionButton extends Component
{
	public $route, $icon, $variant, $class;
	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct($route, $icon, $variant, $class = '')
	{
		$this->route = $route;
		$this->icon = $icon;
		$this->variant = $variant;
		$this->class = $class;
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
