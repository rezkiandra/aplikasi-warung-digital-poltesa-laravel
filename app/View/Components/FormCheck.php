<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormCheck extends Component
{
	public $class;
	public $type;
	public $name;
	public $label;
	public $value;
	/**
	 * Create a new component instance.
	 */
	public function __construct($class = '', $type, $name, $label, $value)
	{
		$this->class = $class;
		$this->type = $type;
		$this->name = $name;
		$this->label = $label;
		$this->value = $value;
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('components.form-check');
	}
}
