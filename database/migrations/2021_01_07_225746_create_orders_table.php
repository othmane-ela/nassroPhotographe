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
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('set null');
                $table->string('billing_email')->nullable();
                $table->string('billing_name')->nullable();
                $table->string('billing_address')->nullable();
                $table->string('billing_city')->nullable();
                $table->string('billing_province')->nullable();
                $table->string('billing_postalcode')->nullable();
                $table->string('billing_phone')->nullable();
                $table->integer('billing_discount')->default(0);
                $table->string('billing_discount_code')->nullable();
                $table->integer('billing_subtotal');
                $table->integer('billing_tax');
                $table->integer('billing_total');
                $table->boolean('shipped')->default(false);
                $table->string('error')->nullable();
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
