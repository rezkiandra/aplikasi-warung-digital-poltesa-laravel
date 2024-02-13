<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputFormLabel extends Component
{
	public $label;
	public $name;
	public $class;
	public $type;
	public $placeholder;
	public $value;
	/**
	 * Create a new component instance.
	 */
	public function __construct($label, $name, $class = "", $type, $placeholder = "", $value)
	{
		$this->label = $label;
		$this->name = $name;
		$this->class = $class;
		$this->type = $type;
		$this->placeholder = $placeholder;
		$this->value = $value;
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('components.input-form-label');
	}
}
