<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSizeAndUnitColumnToProductsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('products', function (Blueprint $table) {
      // $table->enum('size', ['S', 'M', 'L', 'XL', 'XXL'])->after('stock')->nullable();
      // $table->enum('unit', ['kg', 'pcs', 'pack', 'box'])->after('size')->nullable();

      $table->enum('unit', ['kg', 'pcs', 'pack', 'box'])->after('stock')->nullable();
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
      // $table->dropColumn(['size', 'unit']);
      $table->dropColumn(['unit']);
    });
  }
}
