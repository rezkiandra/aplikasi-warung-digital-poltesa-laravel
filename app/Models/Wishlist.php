<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
  use HasFactory;

  protected $fillable = [
    'uuid',
    'customer_id',
    'product_id'
  ];

  public function customer()
  {
    return $this->belongsTo(Customer::class, 'customer_id');
  }

  public function product()
  {
    return $this->belongsTo(Products::class);
  }

  public function category()
  {
    return $this->belongsTo(ProductCategory::class, 'category_id');
  }
}
