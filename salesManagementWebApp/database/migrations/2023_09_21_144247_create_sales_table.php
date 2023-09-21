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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->timestamp('time');

            $table->float('amount', places: 2); //sale_price

            $table->integer('installments');
            $table->integer('sale_number'); //payme_sale_code

            $table->string('description');
            $table->string('currency');
            $table->string('payment_link');
            $table->string('language');

            $table->uuid('seller_payme_id');
            $table->uuid('payme_sale_id');
            $table->uuid('transaction_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
