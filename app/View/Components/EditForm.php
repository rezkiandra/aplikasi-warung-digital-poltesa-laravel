<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EditForm extends Component
{
	public $title, $action, $route, $class;
	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct($title = '', $action = '', $route = '', $class = '')
	{
		$this->title = $title;
		$this->action = $action;
		$this->route = $route;
		$this->class = $class;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|\Closure|string
	 */
	public function render()
	{
		return view('components.edit-form');
	}
}
