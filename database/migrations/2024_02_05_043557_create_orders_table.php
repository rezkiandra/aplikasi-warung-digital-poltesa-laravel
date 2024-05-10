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
    Schema::create('orders', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->unsignedBigInteger('customer_id')->nullable();
      $table->unsignedBigInteger('product_id')->nullable();
      $table->integer('quantity');
      $table->integer('total_price');
      $table->enum('status', ['unpaid', 'paid', 'expire', 'cancelled'])->default('unpaid');
      $table->date('order_date');
      $table->timestamps();

      $table->foreign('customer_id')->references('id')->on('customers');
      $table->foreign('product_id')->references('id')->on('products');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('orders');
  }
};
