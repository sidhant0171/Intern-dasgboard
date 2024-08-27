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
        Schema::create('userdetails', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('user_email')->unique();
            $table->string('password'); 
            $table->string('phone_number');
            $table->string('gender');
            $table->binary('image')->nullable();
            $table->boolean('is_active')->default(false);
            $table->boolean('is_delete')->default(false);
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->timestamps();
        });
    }

      
    
                                            
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userdetails');
    }
};
