<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('su_applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string("name")->unique();
            $table->text("description")->nullable();
            $table->boolean("enabled")->default(true);
            $table->foreignId('department_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('su_applications');
    }
}
