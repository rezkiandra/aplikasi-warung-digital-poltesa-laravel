<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Role::create([
      'role_name' => 'Admin',
			'slug' => 'admin'
    ]);

    Role::create([
      'role_name' => 'Seller',
			'slug' => 'seller'
    ]);

    Role::create([
      'role_name' => 'Customer',
			'slug' => 'customer'
    ]);
  }
}
