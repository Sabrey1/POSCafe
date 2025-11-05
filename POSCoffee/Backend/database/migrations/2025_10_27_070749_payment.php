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
        Schema::create('payment', function (BluePrint $table){
            $table->id();
            $table->string('payment_code')->unique()->nullable();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('payment_type_id')->constrained()->onDelete('cascade');
            $table->string('payment_status');
            $table->string('payment_amount');
            $table->string('note');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment');
    }
};
