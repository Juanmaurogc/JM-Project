<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('image_file_id')->constrained('files')->onDelete('restrict');
            
            $table->boolean('is_active')->default(true);
            $table->string('url_link', 255)->nullable();
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void {
        Schema::dropIfExists('partners');
    }
};