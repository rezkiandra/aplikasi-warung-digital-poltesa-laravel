<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CreateForm extends Component
{
	public $title;
	public $label;
	public $name;
	public $action;
	public $type;
	public $placeholder;
	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct($title, $label, $name, $action = '', $type, $placeholder = '')
	{
		$this->title = $title;
		$this->label = $label;
		$this->name = $name;
		$this->action = $action;
		$this->type = $type;
		$this->placeholder = $placeholder;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|\Closure|string
	 */
	public function render()
	{
		return view('components.create-form');
	}
}
