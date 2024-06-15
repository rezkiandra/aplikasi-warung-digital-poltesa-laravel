<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
  use HasFactory;

  protected $fillable = [
    'uuid',
    'order_id',
    'courier',
    'code',
    'etd',
    'description',
    'price',
    'status',
    'resi',
  ];

  public function order()
  {
    return $this->belongsTo(Order::class);
  }
}
