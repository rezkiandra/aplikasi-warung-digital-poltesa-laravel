<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusAndResiColumnToShippingsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('shippings', function (Blueprint $table) {
      $table->enum('status', ['diproses', 'dikirim', 'diterima'])->default('diproses')->nullable()->after('price');
      $table->string('resi', 50)->nullable()->after('status');
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
      $table->dropColumn(['status', 'resi']);
    });
  }
}
