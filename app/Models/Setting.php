<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
  use HasFactory;

  protected $fillable = ['key', 'value'];

  public static function getValue($key)
  {
    $setting = self::where('key', $key)->first();
    return $setting ? $setting->value : null;
  }

  public static function setValue($key, $value)
  {
    return self::updateOrCreate(['key' => $key], ['value' => $value]);
  }
}
