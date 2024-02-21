<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EditRole extends Component
{
	public $label;
	public $title;
	public $name;
	public $class;
	public $type;
	public $placeholder;
	public $route;
	public $value;
	/**
	 * Create a new component instance.
	 */
	public function __construct($label, $title, $name, $class = "", $type, $placeholder = "", $route, $value)
	{
		$this->label = $label;
		$this->title = $title;
		$this->name = $name;
		$this->class = $class;
		$this->type = $type;
		$this->placeholder = $placeholder;
		$this->route = $route;
		$this->value = $value;
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render()
	{
		return view('components.role.edit-role');
	}
}
