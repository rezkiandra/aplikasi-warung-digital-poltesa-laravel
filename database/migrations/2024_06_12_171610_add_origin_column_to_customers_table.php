<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOriginColumnToCustomersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('customers', function (Blueprint $table) {
      $table->integer('origin')->nullable()->after('address');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('customers', function (Blueprint $table) {
      $table->dropColumn('origin');
    });
  }
}
