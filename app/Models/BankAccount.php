<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
  use HasFactory;

  protected $table = 'bank_accounts';

  protected $fillable = [
    'bank_name',
    'slug',
    'account_number'
  ];

  public function seller()
  {
    return $this->belongsTo(Seller::class);
  }
}
