<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique()->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('plan_id')->nullable();

            $table->string('phone',20)->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->text('address')->nullable();
            $table->string('logo')->nullable();
            $table->tinyInteger('status')->default(1);

            $table->foreignId('role_id')->nullable()->constrained('roles');

            $table->timestamp('trial_ends_at')->nullable();
            $table->timestamps(); // create_at update_at

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organization');
    }
}
