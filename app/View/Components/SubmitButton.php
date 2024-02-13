<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SubmitButton extends Component
{
	public $label;
	public $type;
	public $variant;
	/**
	 * Create a new component instance.
	 */
	public function __construct($label, $type, $variant)
	{
		$this->label = $label;
		$this->type = $type;
		$this->variant = $variant;
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('components.submit-button');
	}
}
