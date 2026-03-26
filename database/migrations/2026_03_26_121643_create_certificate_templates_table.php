<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('certificate_templates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bg_image_file_id')->constrained('files')->onDelete('restrict');

            $table->date('start_date');
            $table->date('end_date');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void {
        Schema::dropIfExists('certificate_templates');
    }
};