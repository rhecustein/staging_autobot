<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $t) {
            $t->id();
            $t->string('slug')->unique();
            $t->string('name');
            $t->string('type'); // physical | subscription
            $t->text('description');
            $t->unsignedInteger('price'); // Rupiah
            $t->string('period')->nullable(); // contoh: "bulan"
            $t->json('features')->nullable();
            $t->string('emoji', 8)->default('📦');
            $t->timestamps();
        });

        Schema::create('orders', function (Blueprint $t) {
            $t->id();
            $t->string('order_id')->unique();
            $t->foreignId('product_id')->constrained();
            $t->string('customer_name');
            $t->string('customer_email');
            $t->string('customer_phone');
            $t->text('customer_address')->nullable();
            $t->unsignedInteger('qty')->default(1);
            $t->unsignedInteger('gross_amount');
            $t->string('status')->default('pending'); // pending | paid | failed | expired
            $t->string('payment_method')->nullable();
            $t->timestamp('paid_at')->nullable();
            $t->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('products');
    }
};
