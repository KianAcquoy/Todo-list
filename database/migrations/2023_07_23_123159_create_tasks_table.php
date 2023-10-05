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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('New task');
            $table->string('description', 10000)->nullable()->default(null);
            $table->foreignId('card_id')->constrained()->onDelete('cascade');
            $table->dateTime('due_date')->nullable()->default(null);
            $table->string('color')->default('#ffffff');
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
