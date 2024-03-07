<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DetailForm extends Component
{
  public $image, $id, $totalOrder, $spentCost, $name, $username, $email, $phone, $address, $status, $type, $class, $variant, $icon, $label, $href, $labelOrder, $labelCost, $action;
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($image = '', $id, $totalOrder, $spentCost, $name = '', $username, $email, $phone = '', $address = '', $status = '', $type, $class = '', $variant, $icon, $label, $href, $labelOrder, $labelCost, $action = '')
  {
    $this->image = $image;
    $this->id = $id;
    $this->totalOrder = $totalOrder;
    $this->spentCost = $spentCost;
    $this->name = $name;
    $this->username = $username;
    $this->email = $email;
    $this->phone = $phone;
    $this->address = $address;
    $this->status = $status;
    $this->type = $type;
    $this->class = $class;
    $this->variant = $variant;
    $this->icon = $icon;
    $this->label = $label;
    $this->href = $href;
    $this->labelOrder = $labelOrder;
    $this->labelCost = $labelCost;
    $this->action = $action;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.detail-form');
  }
}
