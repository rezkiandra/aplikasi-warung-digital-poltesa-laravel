<?php

namespace App\Models;

use App\Models\User;
use App\Models\BankAccount;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seller extends Model
{
  use HasFactory;

  protected $fillable = [
    'uuid',
    'user_id',
    'full_name',
    'slug',
    'address',
    'origin',
    'phone_number',
    'gender',
    'bank_account_id',
    'image',
    'account_number',
    'status',
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function bank()
  {
    return $this->belongsTo(BankAccount::class);
  }

  public function product()
  {
    return $this->hasMany(Products::class);
  }
}
