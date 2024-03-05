<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropGenderColumnToSellersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('sellers', function (Blueprint $table) {
      $table->dropColumn('gender');
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
      $table->string('gender')->after('phone_number');
    });
  }
}
