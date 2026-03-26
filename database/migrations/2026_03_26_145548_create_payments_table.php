<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('payment_type_id')->constrained('type_payments')->onDelete('restrict');
            $table->foreignId('payment_state_id')->default(1)->constrained('state_payments')->onDelete('restrict');

            $table->string('fiscal_name', 200);
            $table->string('tax_number', 30);
            $table->string('document_number', 100);
            $table->decimal('total_amount', 10, 2);
            $table->dateTime('issue_date');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void {
        Schema::dropIfExists('payments');
    }
};