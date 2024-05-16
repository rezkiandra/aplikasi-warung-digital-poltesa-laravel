<?php

namespace App\Helpers;

use Carbon\Carbon;

class DateHelper
{
  public static function now()
  {
    return Carbon::now();
  }

  public static function today()
  {
    return Carbon::today();
  }

  public static function yesterday()
  {
    return Carbon::yesterday();
  }

  public static function tanggalIndo($date)
  {
    return Carbon::parse($date)->isoFormat('dddd, D MMMM Y');
  }
}
