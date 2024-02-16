<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SidebarItem extends Component
{
	public $label;
	public $route;
	public $icon;
	public $datai18n;
	public $active;
	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct($label, $route, $icon, $datai18n = "", $active)
	{
		$this->label = $label;
		$this->route = $route;
		$this->icon = $icon;
		$this->datai18n = $datai18n;
		$this->active = $active;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|\Closure|string
	 */
	public function render()
	{
		return view('components.sidebar-item');
	}
}
