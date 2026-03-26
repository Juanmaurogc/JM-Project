<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('module_training', function (Blueprint $table) {
            $table->foreignId('module_id')->constrained('modules')->onDelete('cascade');
            $table->foreignId('training_id')->constrained('trainings')->onDelete('cascade');
            
            $table->unsignedInteger('sort_order');
            $table->primary(['module_id', 'training_id']);
        });
    }

    public function down(): void {
        Schema::dropIfExists('module_training');
    }
};