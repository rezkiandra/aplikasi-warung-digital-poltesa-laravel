<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    ProductCategory::create([
      'name' => 'Makanan',
      'slug' => 'makanan'
    ]);

    ProductCategory::create([
      'name' => 'Minuman',
      'slug' => 'minuman'
    ]);

    ProductCategory::create([
      'name' => 'Pakaian',
      'slug' => 'pakaian'
    ]);

    ProductCategory::create([
      'name' => 'Kecantikan',
      'slug' => 'kecantikan'
    ]);

    ProductCategory::create([
      'name' => 'Kerajinan',
      'slug' => 'kerajinan'
    ]);
  }
}
