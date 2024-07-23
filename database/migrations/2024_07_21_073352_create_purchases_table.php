<?php

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
        Schema::create('purchases', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('purchase_order_number', 50)->unique();
            $table->unsignedBigInteger('supplier_id');
            $table->date('order_date');
            $table->date('expected_delivery_date');
            $table->decimal('total_amount', 10, 2);
            $table->string('status', 20);
            $table->timestamps();

            $table->foreign('supplier_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
