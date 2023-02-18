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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('cat_id')->comment('This is category id');
            $table->integer('sup_id')->comment('This is supplier id');
            $table->string('product_name');
            $table->string('product_code');
            $table->string('product_store');
            $table->text('image');
            $table->text('description');
            $table->string('buy_date');
            $table->string('exp_date');
            $table->string('buying_price');
            $table->string('selling_price');
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('products');
    }
};
