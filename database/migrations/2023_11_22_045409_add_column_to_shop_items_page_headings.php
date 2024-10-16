<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('page_headings', function (Blueprint $table) {

            $table->string('shop_page_title')->nullable();
            $table->string('shop_details_page_title')->nullable();
            $table->string('cart_page_title')->nullable();
            $table->string('checkout_page_title')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('page_headings', function (Blueprint $table) {
            //
        });
    }
};
