<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CreateCategory extends Component
{
	public $title, $label, $name, $action, $route, $type, $placeholder, $class, $value, $variant, $icon;
	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct($title, $label, $name, $route, $type, $action, $placeholder = '', $class ='', $value, $variant, $icon)
	{
		$this->title = $title;
		$this->label = $label;
		$this->name = $name;
		$this->route = $route;
		$this->action = $action;
		$this->type = $type;
		$this->placeholder = $placeholder;
		$this->class = $class;
		$this->value = $value;
		$this->variant = $variant;
		$this->icon = $icon;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|\Closure|string
	 */
	public function render()
	{
		return view('components.category.create-category');
	}
}
