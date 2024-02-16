<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardForm extends Component
{
	public $label;
	public $name;
	public $type;
	public $placeholder;
	public $example;
	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct($label, $name, $type, $placeholder, $example)
	{
		$this->label = $label;
		$this->name = $name;
		$this->type = $type;
		$this->placeholder = $placeholder;
		$this->example = $example;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|\Closure|string
	 */
	public function render()
	{
		return view('components.card-form');
	}
}
