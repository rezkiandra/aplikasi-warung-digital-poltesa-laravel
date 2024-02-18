<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LevelSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Level::create([
      'level_name' => 'Admin',
			'slug' => 'admin'
    ]);

    Level::create([
      'level_name' => 'Seller',
			'slug' => 'seller'
    ]);

    Level::create([
      'level_name' => 'Customer',
			'slug' => 'customer'
    ]);
  }
}
