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
        Schema::create('working_days', function (Blueprint $table) {
            $table->id();
            $table->string('working_day_code')->unique()->nullable();
            $table->string('name');
            $table->date('opening_date');
            $table->date('close_date');
            $table->string('open_by')->nullable();
            $table->string('close_by')->nullable();
            $table->string('status')->nullable();
            $table->string('description')->nullable();
            $table->string('owner')->nullable();
            $table->string('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('working_days');
    }
};
