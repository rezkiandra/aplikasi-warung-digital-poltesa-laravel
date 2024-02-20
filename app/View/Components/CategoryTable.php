<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CategoryTable extends Component
{
	public $title;
	public $fields;
	public $datas;
	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct($title,$fields, $datas)
	{
		$this->title = $title;
		$this->fields = $fields;
		$this->datas = $datas;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|\Closure|string
	 */
	public function render()
	{
		return view('components.category.category-table');
	}
}
