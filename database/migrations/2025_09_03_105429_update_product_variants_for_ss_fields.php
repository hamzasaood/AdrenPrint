<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProductVariantsForSsFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_variants', function (Blueprint $table) {
            if (!Schema::hasColumn('product_variants', 'ss_sku_id')) {
                $table->unsignedBigInteger('ss_sku_id')->nullable()->index()->after('sku');
            }
            if (!Schema::hasColumn('product_variants', 'color')) {
                $table->string('color')->nullable()->after('ss_sku_id');
            }
            if (!Schema::hasColumn('product_variants', 'color_code')) {
                $table->string('color_code')->nullable()->after('color');
            }
            if (!Schema::hasColumn('product_variants', 'swatch_image')) {
                $table->string('swatch_image')->nullable()->after('color_code');
            }
            if (!Schema::hasColumn('product_variants', 'size')) {
                $table->string('size')->nullable()->after('swatch_image');
            }
            if (!Schema::hasColumn('product_variants', 'map_price')) {
                $table->decimal('map_price', 10, 2)->default(0)->after('price');
            }
            if (!Schema::hasColumn('product_variants', 'warehouses')) {
                $table->json('warehouses')->nullable()->after('stock');
            }
            // Ensure unique sku if not already
            try { $table->unique('sku'); } catch (\Throwable $e) {}
            // Helpful index
            $table->index(['product_id', 'color', 'size']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_variants', function (Blueprint $table) {
            //
        });
    }
}
