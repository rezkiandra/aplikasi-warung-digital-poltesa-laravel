<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCustomerIdColumnToShippingsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('shippings', function (Blueprint $table) {
      $table->unsignedBigInteger('customer_id')->nullable()->after('order_id');
      $table->foreign('customer_id')->references('customer_id')->on('orders')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('shippings', function (Blueprint $table) {
      $table->dropForeign(['customer_id']);
      $table->dropColumn('customer_id');
    });
  }
}
