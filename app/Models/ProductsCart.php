<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsCart extends Model
{
  use HasFactory;

  protected $fillable = [
    'customer_id',
    'product_id',
    'quantity',
  ];

  public function product()
  {
    return $this->belongsTo(Products::class);
  }

  public function customer()
  {
    return $this->belongsTo(Customer::class);
  }
}
