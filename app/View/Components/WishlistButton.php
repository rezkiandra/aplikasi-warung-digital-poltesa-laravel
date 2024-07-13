<?php

namespace App\View\Components;

use Illuminate\View\Component;

class WishlistButton extends Component
{
  public $product, $wishlistUUID;
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($product, $wishlistUUID)
  {
    $this->product = $product;
    $this->wishlistUUID = $wishlistUUID;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.wishlist-button');
  }
}
