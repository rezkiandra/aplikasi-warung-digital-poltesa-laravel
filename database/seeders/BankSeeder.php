<?php

namespace Database\Seeders;

use App\Models\BankAccount;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    BankAccount::create([
      'bank_name' => 'BCA',
      'slug' => 'bca',
    ]);
    
    BankAccount::create([
      'bank_name' => 'Mandiri',
      'slug' => 'Mandiri',
    ]);

    BankAccount::create([
      'bank_name' => 'Kalbar Syariah',
      'slug' => 'kalbar-syariah',
    ]);

    BankAccount::create([
      'bank_name' => 'BRI',
      'slug' => 'bri',
    ]);
  }
}
