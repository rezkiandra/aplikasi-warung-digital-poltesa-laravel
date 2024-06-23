<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SellerCard extends Component
{
	public $datas, $label, $icon, $variant, $description, $count, $growth;
	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct($datas, $label, $icon, $variant, $description = 'Total', $count, $growth = '')
	{
		$this->datas = $datas;
		$this->label = $label;
		$this->icon = $icon;
		$this->variant = $variant;
		$this->description = $description;
		$this->count = $count;
		$this->growth = $growth;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|\Closure|string
	 */
	public function render()
	{
		return view('components.seller.seller-card');
	}
}
