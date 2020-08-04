<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('reference_number')->unique();
            $table->string('title')->unique();
            $table->text('description')->nullable();
            $table->boolean('resolved')->default(false);
            $table->string('reporter_name');
            $table->string('reporter_email');
            $table->unsignedBigInteger('created_by')->nullable();
//            $table->unsignedBigInteger('resolved_by')->nullable();
            //$table->timestamp('resolved_at');

            $table->foreign('created_by')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
