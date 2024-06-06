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
        Schema::create('contacts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignIdFor(\App\Models\User::class, column: 'created_by')->constrained('users');
            $table->string('full_name')->nullable();
            $table->enum('status', \App\Enums\ContactStatusEnum::getValuesForMigration());
            $table->string('identification')->nullable();
            $table->json('phones')->nullable();
            $table->json('emails')->nullable();
            $table->string('website')->nullable();
            $table->string('address')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
