<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatelistenersRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listeners_requests', function (Blueprint $table) {
            $table->id();
            $table->boolean('new')->default(1);
            $table->foreignId('program_id')->constrained('programs');
            $table->foreignId('user_id')->constrained('users');
            $table->string('documents');
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
        Schema::dropIfExists('listeners_requests');
    }
}
