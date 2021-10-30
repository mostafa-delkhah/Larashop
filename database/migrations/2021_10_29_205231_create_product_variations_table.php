<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductVariationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_variations', function (Blueprint $table) {
            $table->id();

            $table->string("value");
            $table->unsignedInteger("price");
            $table->unsignedInteger("sale_price")->nullable();
            $table->unsignedInteger("quantity");
            $table->string("sku")->nullable();
            $table->timestamp("date_on_sale_from")->nullable();
            $table->timestamp("date_on_sale_to")->nullable();

            $table->foreignId("attribute_id");
            $table->foreign("attribute_id")
                    ->references("id")
                    ->on("attributes")
                    ->onDelete("cascade")
                    ->onUpdate("cascade");

            $table->foreignId("product_id");
            $table->foreign("product_id")
                    ->references("id")
                    ->on("products")
                    ->onDelete("cascade")
                    ->onUpdate("cascade");

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
        Schema::dropIfExists('product_variations');
    }
}
