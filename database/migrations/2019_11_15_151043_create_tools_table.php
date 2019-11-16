<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tools', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('rfid')->unique();
            $table->unsignedBigInteger('last_place_id')->nullable();
            $table->dateTime('last_place_updated_at')->nullable();
            $table->unsignedBigInteger('current_place_id')->nullable();
            $table->dateTime('current_place_updated_at')->nullable();

            $table->foreign('last_place_id')
                ->references('id')
                ->on('places')
                ->onDelete('cascade');
            $table->foreign('current_place_id')
                ->references('id')
                ->on('places')
                ->onDelete('cascade');

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
        Schema::dropIfExists('tools');
    }
}
