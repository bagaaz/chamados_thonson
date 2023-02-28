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
        Schema::create('calls', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('service_order')->nullable();
            $table->string('local_mnemonic')->nullable();
            $table->string('outside_mnemonic')->nullable();
            $table->bigInteger('priority_id')->unsigned();
            $table->foreign('priority_id')->references('id')->on('priorities');
            $table->bigInteger('caller_id')->unsigned();
            $table->foreign('caller_id')->references('id')->on('users');
            $table->bigInteger('technician_id')->unsigned()->nullable();
            $table->foreign('technician_id')->references('id')->on('users');
            $table->bigInteger('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('status');
            $table->json('images')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calls');
    }
};
