<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->default(3)->constrained('type_roles')->onDelete('restrict');

            $table->string('name', 255);
            $table->string('email', 150)->unique();
            $table->string('phone', 30)->nullable();
            $table->string('password', 255)->nullable();
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void {
        Schema::dropIfExists('users');
    }
};