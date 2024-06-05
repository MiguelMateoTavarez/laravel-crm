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
        Schema::create('schedules', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignIdFor(\App\Models\Contact::class)->constrained('contacts');
            $table->foreignIdFor(\App\Models\User::class, column: 'created_by')->constrained('users');
            $table->enum('type', \App\Enums\ScheduleTypeEnum::getValuesForMigration());
            $table->longText('description')->nullable();
            $table->date('date');
            $table->date('expiration_date')->nullable();
            $table->timestamp('time');
            $table->string('address')->nullable();
            $table->tinyInteger('reminder')->comment('Time in minutes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
