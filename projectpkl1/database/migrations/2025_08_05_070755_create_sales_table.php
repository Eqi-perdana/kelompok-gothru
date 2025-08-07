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
        $table->id(); // id bigint primary key auto increment
        $table->foreignId('user_id')->constrained('users'); // user_id bigint references users(id)
        $table->date('sale_date'); // sale_date date
        $table->decimal('total_amount', 15, 2); // total_amount decimal(15,2)
        $table->enum('payment_method', ['cash', 'transfer', 'qris']); // payment_method enum
        $table->timestamps(); // created_at and updated_at
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
