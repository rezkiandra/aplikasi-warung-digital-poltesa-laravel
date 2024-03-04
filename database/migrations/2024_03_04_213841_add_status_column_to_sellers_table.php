<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusColumnToSellersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('sellers', function (Blueprint $table) {
      $table->enum('status', ['active', 'inactive', 'pending'])->after('image')->default('pending');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('sellers', function (Blueprint $table) {
      $table->dropColumn('status');
    });
  }
}
