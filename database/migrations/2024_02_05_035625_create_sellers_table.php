<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('sellers', function (Blueprint $table) {
      $table->id();
      $table->string('full_name', 30);
      $table->text('address');
      $table->string('phone_number', 15);
      $table->enum('gender', ['laki-laki', 'perempuan']);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('sellers');
  }
};
