<?php

namespace App\Console\Commands;

use App\Models\Order;
use Illuminate\Console\Command;

class CheckExpireOrderDate extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'order:check-expire-date';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Mengecek order yang sudah kadaluarsa';

  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Execute the console command.
   *
   * @return int
   */
  public function handle()
  {
    $this->info('Mengecek order yang sudah kadaluarsa');

    Order::where('status', 'unpaid')
      ->where('created_at', '<', date('Y m d H:i:s'))
      ->update(['status' => 'expire']);

    $this->info('Selesai');
  }
}
