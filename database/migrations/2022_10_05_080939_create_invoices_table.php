<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('ID');
            $table->primary('ID');
            $table->timestamps();
            $table->unsignedBigInterger('customer_ID');
            $table->date('transaction_date');
            $table->string('time');
            $table->string('createdBy');
            $table->foreign('customer_ID')->references('id')->on('customer')->onDelete('cascade');
            $table->integer('amount_due');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
