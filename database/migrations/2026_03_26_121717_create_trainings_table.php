<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('training_type_id')->constrained('type_trainings')->onDelete('restrict');
            
            $table->string('title', 200);
            $table->text('description')->nullable();
            $table->dateTime('presentation_date_time');
            $table->unsignedInteger('min_enrollments');
            $table->unsignedInteger('max_enrollments');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void {
        Schema::dropIfExists('trainings');
    }
};