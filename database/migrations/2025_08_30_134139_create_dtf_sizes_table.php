<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDtfSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dtf_sizes', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // e.g. "4x4 in", "8x10 in"
            $table->decimal('width', 8, 2);  // inches
            $table->decimal('height', 8, 2); // inches
            $table->decimal('rate', 8, 4)->default(0.05); // per square inch
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('dtf_sizes');
    }
}
