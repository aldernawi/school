<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {

            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->json('quiz_data');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('quizzes');
    }
    
};
