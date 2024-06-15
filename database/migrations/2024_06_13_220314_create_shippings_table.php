<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('shippings', function (Blueprint $table) {
      $table->id();
      $table->uuid('uuid');
      $table->unsignedBigInteger('order_id')->nullable();
      $table->string('courier', 50);
      $table->char('code', 20);
      $table->char('etd', 10);
      $table->string('description', 50);
      $table->integer('price');
      $table->timestamps();

      $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('shippings');
  }
}
