<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SellerTable extends Component
{
	public $title, $datas, $fields;
	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct($fields, $datas, $title)
	{
		$this->fields = $fields;
		$this->title = $title;
		$this->datas = $datas;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|\Closure|string
	 */
	public function render()
	{
		return view('components.seller.seller-table');
	}
}
