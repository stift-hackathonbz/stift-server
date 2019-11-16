<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChecklistToolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklist_tool', function (Blueprint $table) {
            $table->unsignedBigInteger('checklist_id');
            $table->unsignedBigInteger('tool_id');

            $table->foreign('checklist_id')
                ->references('id')
                ->on('checklists')
                ->onDelete('cascade');
            $table->foreign('tool_id')
                ->references('id')
                ->on('tools')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checklist_tool');
    }
}
