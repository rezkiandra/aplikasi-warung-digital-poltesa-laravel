<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  use HasFactory;

  protected $fillable = [
    'uuid',
    'user_id',
    'nik_nim',
    'full_name',
    'slug',
    'address',
    'origin',
    'phone_number',
    'gender',
    'image',
    'status'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function bank()
  {
    return $this->belongsTo(BankAccount::class);
  }

  public function wishlist()
  {
    return $this->hasMany(Wishlist::class);
  }
}
