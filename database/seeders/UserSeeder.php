<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    User::create([
      'uuid' => Str::uuid('id'),
      'name' => 'Rezkiandra',
      'slug' => Str::slug('rezkiandra'),
      'email' => 'rezki@admin.com',
      'role_id' => 1,
      'password' => Hash::make('rezki123')
    ]);
  }
}
