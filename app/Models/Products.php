<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
  use HasFactory;

  protected $fillable = [
    'uuid',
    'seller_id',
    'name',
    'slug',
    'description',
    'price',
    'stock',
    'category_id',
    'image',
  ];

	public function category()
	{
		return $this->belongsTo(ProductCategory::class);
	}

  public function seller()
  {
    return $this->belongsTo(Seller::class);
  }

  public function cart()
  {
    return $this->belongsTo(ProductsCart::class);
  }

  public function order()
  {
    return $this->belongsTo(Order::class);
  }
}
