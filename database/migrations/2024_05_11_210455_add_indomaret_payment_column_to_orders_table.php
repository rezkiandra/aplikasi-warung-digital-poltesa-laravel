<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndomaretPaymentColumnToOrdersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('orders', function (Blueprint $table) {
      $table->string('store')->nullable()->after('payment_method');
      $table->string('payment_code')->nullable()->after('store');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('orders', function (Blueprint $table) {
      $table->dropColumn(['store', 'payment_code']);
    });
  }
}
