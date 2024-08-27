<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attendance_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('internship_id');
            $table->foreign('user_id')->references('user_id')->on('attendances')->onDelete('cascade');
            $table->foreign('internship_id')->references('internship_id')->on('attendances')->onDelete('cascade');
            $table->string('reason');
            $table->string('status')->default('Pending');
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
};
