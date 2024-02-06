<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SideNavLink extends Component
{
  public $active;
  public $title;
  public $url;
  /**
   * Create a new component instance.
   */
  public function __construct($active, $title, $url)
  {
    $this->active = $active;
    $this->title = $title;
    $this->url = $url;
  }

  /**
   * Get the view / contents that represent the component.
   */
  public function render(): View|Closure|string
  {
    return view('components.side-nav-link');
  }
}
