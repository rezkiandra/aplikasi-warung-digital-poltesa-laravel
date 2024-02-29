<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CreateForm extends Component
{
	public $title, $action, $route;
	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct($title, $route, $action)
	{
		$this->title = $title;
		$this->route = $route;
		$this->action = $action;
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
