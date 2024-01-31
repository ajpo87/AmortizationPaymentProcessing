<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmortizationsTable extends Migration
{
    public function up()
    {
        Schema::create('amortizations', function (Blueprint $table) {
            $table->id();
            $table->date('schedule_date');
            $table->string('state');
            $table->decimal('amount', 10, 2);
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('amortizations');
    }
}
