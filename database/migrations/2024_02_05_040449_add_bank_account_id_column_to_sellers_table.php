<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::table('sellers', function (Blueprint $table) {
      $table->unsignedBigInteger('bank_account_id')->nullable()->after('phone_number');
      $table->foreign('bank_account_id')->references('id')->on('bank_accounts')->onDelete('set null');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('sellers', function (Blueprint $table) {
      $table->dropForeign(['bank_account_id']);
      $table->dropColumn('bank_account_id');
    });
  }
};
