<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id();

            $table->string("value");
            $table->boolean("is_active")->default(1);

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
        Schema::dropIfExists('product_attributes');
    }
}
