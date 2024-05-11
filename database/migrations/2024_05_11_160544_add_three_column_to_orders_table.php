<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddThreeColumnToOrdersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('orders', function (Blueprint $table) {
      $table->timestamp('transaction_time')->nullable()->after('expiry_time');
      $table->string('biller_code')->nullable()->after('acquirer');
      $table->string('bill_key')->nullable()->after('biller_code');
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
      $table->dropColumn(['transaction_time', 'biller_code', 'bill_key']);
    });
  }
}
