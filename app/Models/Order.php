<?php

namespace App\Models;

use App\Models\Customer;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
  use HasFactory;

  protected $fillable = [
    'uuid',
    'customer_id',
    'product_id',
    'seller_id',
    'quantity',
    'total_price',
    'status',
    'order_type',
    'payment_method',
    'store',
    'payment_code',
    'expiry_time',
    'transaction_time',
    'issuer',
    'acquirer',
    'biller_code',
    'bill_key',
    'snap_token'
  ];

  public function customer()
  {
    return $this->belongsTo(Customer::class);
  }

  public function product()
  {
    return $this->belongsTo(Products::class);
  }

  public function seller()
  {
    return $this->belongsTo(Seller::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function shipping()
  {
    return $this->hasOne(Shipping::class);
  }
}
