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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_code')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('role')->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->date('hire_date')->nullable();
            $table->string('employee_type')->nullable();
            $table->string('position')->nullable();
            $table->decimal('salary',10,2)->nullable();
            $table->string('address')->nullable();
            $table->string('status')->nullable();
            $table->string('note')->nullable();
            $table->boolean('disabled')->defult(false);
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
