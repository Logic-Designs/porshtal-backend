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
        Schema::table('purchases', function (Blueprint $table) {
            // Drop the existing foreign key constraint
            $table->dropForeign(['supplier_id']);
            $table->dropColumn('supplier_id');
        });

        Schema::table('purchases', function (Blueprint $table) {
            // Add the supplier_id column as a UUID and update the foreign key constraint
            $table->uuid('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('purchases', function (Blueprint $table) {
            // Drop the new foreign key constraint
            $table->dropForeign(['supplier_id']);
            $table->dropColumn('supplier_id');
        });

        Schema::table('purchases', function (Blueprint $table) {
            // Change the supplier_id column back to unsignedBigInteger and restore the old foreign key constraint
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
};
