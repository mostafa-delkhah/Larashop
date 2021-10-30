<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string("name");
            $table->string("slug")->unique();
            $table->text("description");
            $table->string("primary_image");
            $table->boolean("is_active")->default(1);
            $table->integer("status")->default(1);
            $table->unsignedInteger("delivery_amount")->default(0);
            $table->unsignedInteger("delivery_amount_per_product")->nullable();


            $table->foreignId("brand_id");
            $table->foreign("brand_id")
                    ->references("id")
                    ->on("brands")
                    ->onDelete("cascade")
                    ->onUpdate("cascade");

            $table->foreignId("category_id");
            $table->foreign("category_id")
                    ->references("id")
                    ->on("categories")
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
        Schema::dropIfExists('products');
    }
}
