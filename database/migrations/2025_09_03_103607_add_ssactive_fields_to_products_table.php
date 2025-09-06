<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSsactiveFieldsToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            // style-level identifiers
            if (!Schema::hasColumn('products', 'ss_product_id')) {
                $table->unsignedBigInteger('ss_product_id')->nullable()->index()->after('is_active'); // SS styleID
            }
            if (!Schema::hasColumn('products', 'brand')) {
                $table->string('brand')->nullable()->after('category_id');
            }
            if (!Schema::hasColumn('products', 'style_number')) {
                $table->string('style_number')->nullable()->after('brand'); // SS styleName (e.g., CN101)
            }
            if (!Schema::hasColumn('products', 'main_image')) {
                $table->string('main_image')->nullable()->after('image'); // store front image URL if any
            }
            // ensure base price/stock exist
            if (!Schema::hasColumn('products', 'price')) {
                $table->decimal('price', 10, 2)->default(0)->after('category_id');
            }
            if (!Schema::hasColumn('products', 'stock')) {
                $table->integer('stock')->default(0)->after('price');
            }
            // ensure slug uniqueness for clean URLs
            if (!Schema::hasColumn('products', 'slug')) {
                $table->unique('slug');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}
