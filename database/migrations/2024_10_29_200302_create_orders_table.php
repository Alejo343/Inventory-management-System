<?php

use App\Enums\OrderStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Customer::class)->constrained();
            $table->string('order_date');
            $table->tinyInteger('order_status')->default(OrderStatus::PENDING->value)->comment('0 - Pending / 1 - Complete / 2 - canceled');
            $table->integer('total_products');
            $table->integer('sub_total')->unsigned();
            $table->integer('iva');
            $table->integer('total')->unsigned();
            $table->string('invoice_no');
            $table->string('payment_type');
            $table->integer('pay');
            $table->integer('due');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
