<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EditForm extends Component
{
	public $label;
	public $title;
	public $name;
	public $class;
	public $type;
	public $placeholder;
	public $datas;
	/**
	 * Create a new component instance.
	 */
	public function __construct($label, $title, $name, $class = "", $type, $placeholder = "", $datas)
	{
		$this->label = $label;
		$this->title = $title;
		$this->name = $name;
		$this->class = $class;
		$this->type = $type;
		$this->placeholder = $placeholder;
		$this->datas = $datas;
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render()
	{
		return view('components.edit-form');
	}
}
