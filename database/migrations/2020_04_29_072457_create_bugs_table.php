<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bugs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->String('reference_number')->unique();
            $table->String('title')->unique();
            $table->text('description')->nullable();
            $table->boolean('resolved')->default(false);
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('resolved_by')->nullable();
            $table->timestamp('resolved_at');

            $table->foreign('created_by')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('resolved_by')->references('id')->on('users')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bugs');
    }
}
