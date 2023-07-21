<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('post_code')->unique();
            $table->enum('payment_method',['cod','online'])->default('cod');
            $table->string('currency');
            $table->float('amount');
            $table->string('order_no')->unique();
            $table->string('invoice_no')->unique();
            $table->date('date');
            $table->enum('status',['new','process','delivered','cancel'])->default('new');
            $table->string('transaction');
            $table->integer('user_id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
