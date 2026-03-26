<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('training_speaker', function (Blueprint $table) {
            $table->foreignId('training_id')->constrained('trainings')->onDelete('cascade');
            $table->foreignId('speaker_id')->constrained('speakers')->onDelete('cascade');
            
            $table->primary(['training_id', 'speaker_id']);
        });
    }

    public function down(): void {
        Schema::dropIfExists('training_speaker');
    }
};