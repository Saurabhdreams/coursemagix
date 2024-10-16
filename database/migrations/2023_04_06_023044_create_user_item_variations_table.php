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
        Schema::create('user_item_variations', function (Blueprint $table) {
            $table->id();
            $table->integer('item_id')->nullable();
            $table->integer('language_id')->nullable();
            $table->string('variant_name')->nullable();
            $table->text('option_name')->nullable();
            $table->text('option_price')->nullable();
            $table->text('option_stock')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_item_variations');
    }
};
