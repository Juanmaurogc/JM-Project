<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('files', function (Blueprint $table) {
            $table->id();

            $table->string('file_path', 500);
            $table->string('original_file_name', 255);
            $table->string('hash', 64)->unique();
            $table->string('mime_type', 100)->nullable();
            $table->unsignedInteger('size')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void {
        Schema::dropIfExists('files');
    }
};