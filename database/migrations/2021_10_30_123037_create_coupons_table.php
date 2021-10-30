<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();

            $table->string("name");
            $table->string("code");
            $table->text("description");

            $table->enum("type" , ["amount" , "percentage"]);
            $table->unsignedInteger("amount")->nullable();
            $table->unsignedInteger("percentage")->nullable();
            $table->unsignedInteger("max_percentage_amount")->nullable();
            $table->timestamp("expire_at");

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
        Schema::dropIfExists('coupons');
    }
}
