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
        Schema::create('shifts', function (Blueprint $table) {
            $table->id();
            $table->string('shift_code')->unique()->nullable();
            $table->string('name');
            $table->foreignId('working_day_id')
                    ->nullable()
                  ->constrained('working_days')
                  ->onUpdate('cascade')
                  ->onDelete('set null');
            $table->timestamps();
            $table->date('shift_date');
            $table->string('note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shifts');
    }
};
