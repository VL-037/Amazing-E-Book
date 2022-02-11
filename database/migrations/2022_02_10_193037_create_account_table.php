<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account', function (Blueprint $table) {
            $table->id('account_id');
            $table->foreignId('role_id')->references('role_id')->on('role')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('gender_id')->references('gender_id')->on('gender')->onUpdate('cascade')->onDelete('cascade');
            $table->string('remember_token')->nullable(true);
            $table->string('first_name', 25)->nullable(false);
            $table->string('middle_name', 25)->nullable(true);
            $table->string('last_name', 25)->nullable(false);
            $table->string('email', 50)->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('display_picture_link', 255)->nullable(false);
            $table->integer('delete_flag')->nullable(true);
            $table->date('modified_at')->nullable(true);
            $table->string('modified_by', 255)->nullable(true);
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
        Schema::dropIfExists('account');
    }
}
