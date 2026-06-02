<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('slug',100)->default();
            $table->decimal('price',10,2)->default(0.00);
            $table->enum('billing_cycle',['monthly', 'yearly'])->default('monthly');
            $table->enum('subscriptions',['basic', 'silver','gold'])->default('basic');
            $table->integer('max_properties')->default(5);
            $table->integer('max_tenants')->default(20);
            $table->integer('max_users')->default(3);
            $table->json('features')->nullable();
            $table->integer('trial_days')->default(0);
            $table->string('asset_liabilities',100)->nullable();
            $table->tinyInteger('is_active')->default(1);
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
        Schema::dropIfExists('plans');
    }
}
