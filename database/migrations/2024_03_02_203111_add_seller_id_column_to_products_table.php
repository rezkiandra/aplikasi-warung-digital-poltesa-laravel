<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSellerIdColumnToProductsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('products', function (Blueprint $table) {
      // how to add foreign key references uuid from sellers.id
      $table->unsignedBigInteger('seller_id')->nullable()->after('id');
      $table->foreign('seller_id')->references('id')->on('sellers')->constrained()->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('products', function (Blueprint $table) {
      $table->dropForeign(['seller_id']);
      $table->dropColumn('seller_id');
    });
  }
}
