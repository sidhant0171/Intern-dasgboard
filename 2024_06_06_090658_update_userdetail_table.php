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
        Schema::table('userdetails', function (Blueprint $table) {
            $table->dropColumn(['user_email', 'password']);
            // $table->unsignedBigInteger('internship_id');
            // $table->foreign('internship_id')->references('id')->on('internships')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('userdetails', function (Blueprint $table) {
            //
        });
    }
};
