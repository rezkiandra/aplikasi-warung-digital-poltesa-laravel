<?php

namespace App\View\Components\table;

use Illuminate\View\Component;

class BasicTable extends Component
{
	public $fields;
	public $data;
	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct($fields, $data)
	{
		$this->fields = $fields;
		$this->data = $data;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|\Closure|string
	 */
	public function render()
	{
		return view('components.table.basic-table');
	}
}
