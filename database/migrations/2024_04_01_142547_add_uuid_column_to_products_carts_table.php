<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUuidColumnToProductsCartsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('products_carts', function (Blueprint $table) {
      $table->string('uuid')->after('id')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('products_carts', function (Blueprint $table) {
      $table->dropColumn('uuid');
    });
  }
}
