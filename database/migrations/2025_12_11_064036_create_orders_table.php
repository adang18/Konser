<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
public function up()
{
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->foreignId('concert_id')->constrained()->cascadeOnDelete();
        $table->foreignId('ticket_category_id')->constrained()->cascadeOnDelete();
        $table->string('buyer_name');
        $table->string('buyer_email');
        $table->string('buyer_phone');
        $table->integer('quantity');
        $table->integer('total_price');
        $table->string('status')->default('pending');
        $table->string('payment_proof')->nullable();
        $table->string('payment_method')->nullable();
        $table->string('ticket_code')->nullable(); 
        $table->timestamps();
    });
}

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
