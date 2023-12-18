<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRedemptionConfirmationAndDeletedAtToVoucherablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('voucherables', function (Blueprint $table) {
            $table->boolean('redemption_confirmation')->default(false)->after('redeemed_at');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('voucherables', function (Blueprint $table) {
            $table->dropColumn('redemption_confirmation');
            $table->dropSoftDeletes();
        });
    }
}
