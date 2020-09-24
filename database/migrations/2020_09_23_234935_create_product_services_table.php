<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('proposal_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->integer('product_quantity')->nullable();
            $table->double('product_price')->nullable();
            $table->double('product_discount')->nullable();
            $table->double('amount')->nullable();
            $table->double('sub_total')->nullable();
            $table->double('final_discount')->nullable();
            $table->double('final_amount_after_discount')->nullable();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('product_services');
    }
}
