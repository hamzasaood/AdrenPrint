<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // customer placing order
            $table->string('status')->default('pending'); // pending, paid, in_progress, completed
            $table->string('payment_status')->default('unpaid'); // unpaid, paid, refunded
            $table->decimal('total_amount', 10, 2)->default(0);
            $table->string('gang_sheet_file')->nullable(); // for gang sheet integration
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
