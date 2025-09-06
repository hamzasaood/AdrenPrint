<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGangsheetsFieldsToOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_products', function (Blueprint $table) {
            $table->string('product_name')->nullable();
            $table->string('product_image')->nullable();

            // For gangsheets
            $table->string('design_id')->nullable();
            $table->string('design_name')->nullable();
            $table->string('preview')->nullable(); // saved local path or URL
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->string('size_title')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_products', function (Blueprint $table) {
            //
        });
    }
}
