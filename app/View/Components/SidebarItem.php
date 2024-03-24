<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SidebarItem extends Component
{
	public $label;
	public $route;
	public $icon;
  public $badge;
	public $active;
	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct($label, $route, $icon, $badge = '', $active)
	{
		$this->label = $label;
		$this->route = $route;
		$this->icon = $icon;
    $this->badge = $badge;
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
