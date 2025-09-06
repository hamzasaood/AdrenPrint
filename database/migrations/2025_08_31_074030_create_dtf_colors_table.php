<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDtfColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dtf_colors', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique(); // slug like 'fullcolor'
            $table->string('label'); // display label e.g. "Full Color"
            $table->decimal('surcharge', 8, 4)->default(0.00); // extra per sq inch
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
        Schema::dropIfExists('dtf_colors');
    }
}
