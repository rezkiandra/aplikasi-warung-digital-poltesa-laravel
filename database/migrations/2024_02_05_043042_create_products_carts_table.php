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
    Schema::create('products_carts', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('customer_id')->nullable();
      $table->unsignedBigInteger('product_id')->nullable();
      $table->integer('quantity')->default(1);
      $table->timestamps();

      $table->foreign('customer_id')->references('id')->on('customers')->cascadeOnDelete();
      $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('products_carts');
  }
};
