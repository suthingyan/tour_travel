<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('payment_id')->constrained()->onDelete('cascade');
            $table->integer('total_qty');
            $table->decimal('total_amt', 10, 2);
            $table->string('order_no');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_no');
            $table->string('capital');
            $table->string('district');
            $table->string('township');
            $table->text('address');
            $table->json('package_ids'); // JSON column for storing an array of package IDs
            $table->json('package_prices'); // JSON column for storing an array of package IDs
            $table->json('package_quantities'); // JSON column for storing an array of package IDs
            $table->enum('status', ['Pending', 'Approved'])->default('Pending');
            $table->string('payment_image');
            $table->string('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}