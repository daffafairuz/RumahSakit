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
        Schema::create('hargas', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name');
            $table->bigInteger('min')->default(0);
            $table->bigInteger('max')->default(0);
            $table->boolean('is_active')->default(true);
            $table->foreignUlid('created_by_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignUlid('updated_by_id')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hargas');
    }
};
