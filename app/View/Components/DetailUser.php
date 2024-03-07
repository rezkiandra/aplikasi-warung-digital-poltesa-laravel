<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DetailUser extends Component
{
  public $id, $image, $username, $email, $role, $type, $variant, $icon, $href, $class, $label;
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($id, $image, $username, $email, $role, $type, $variant, $icon, $href, $class = '', $label)
  {
    $this->id = $id;
    $this->image = $image;
    $this->username = $username;
    $this->email = $email;
    $this->role = $role;
    $this->type = $type;
    $this->variant = $variant;
    $this->icon = $icon;
    $this->href = $href;
    $this->class = $class;
    $this->label = $label;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.detail-user');
  }
}
