<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
  use HasFactory;

  protected $fillable = [
    'level_name',
    'slug'
  ];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
