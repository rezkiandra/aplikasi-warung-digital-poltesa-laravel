<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  use HasFactory;

  protected $fillable = [
    'uuid',
    'customer_id',
    'product_id',
    'quantity',
    'total_price',
    'status',
  ];

  public function customer()
  {
    return $this->belongsTo(Customer::class);
  }

  public function product()
  {
    return $this->belongsTo(Products::class);
  }
}
