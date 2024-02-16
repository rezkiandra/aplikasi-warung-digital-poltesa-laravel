<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ValidationError extends Component
{
	public $name;
	/**
	 * Create a new component instance.
	 */
	public function __construct($name)
	{
		$this->name = $name;
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render()
	{
		return view('components.validation-error');
	}
}
