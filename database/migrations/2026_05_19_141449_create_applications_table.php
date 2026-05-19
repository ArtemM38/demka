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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('car_models_id')->constrained()->onDelete('cascade');
            $table->foreignId('car_marks_id')->constrained()->onDelete('cascade');
            $table->string('address');
            $table->string('phone');
            $table->datetime('date');
            $table->string('license_series');
            $table->date('license_date');
            $table->enum('pay_method', ['cash', 'card'])->default('cash');
            $table->enum('status', ['new', 'cancel', 'completed'])->default('new');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
