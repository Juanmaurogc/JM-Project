<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('speakers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('photo_file_id')->nullable()->constrained('files')->onDelete('set null');

            $table->string('name', 150);
            $table->string('title', 150)->nullable();
            $table->text('bio')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void {
        Schema::dropIfExists('speakers');
    }
};