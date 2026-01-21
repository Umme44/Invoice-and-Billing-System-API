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
        {
        Schema::table('invoice', function (Blueprint $table) {
            $table->decimal('tax', 10, 2)->nullable();
            $table->decimal('discount', 10, 2)->nullable();
            $table->decimal('total', 10, 2)->nullable();
            $table->enum('status', ['paid', 'unpaid'])->default('unpaid');
        });
    }


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
