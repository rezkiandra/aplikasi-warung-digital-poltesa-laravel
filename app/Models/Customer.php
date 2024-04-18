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
    'full_name',
    'slug',
    'address',
    'phone_number',
    'gender',
    'bank_account_id',
    'image',
    'account_number',
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
}
