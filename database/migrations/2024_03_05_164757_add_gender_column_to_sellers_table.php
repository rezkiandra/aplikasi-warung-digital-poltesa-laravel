<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGenderColumnToSellersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('sellers', function (Blueprint $table) {
      $table->enum('gender', ['laki-laki', 'perempuan'])->after('phone_number');
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
      $table->dropColumn('gender');
    });
  }
}
