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
            // $table->unsignedBigInteger('users_id')->after('role_id');
            // $table->foreign('users_id')->references('id')->on('users');
            $table->string('phone_number')->nullable()->default(null)->change();
            $table->binary('image')->nullable()->default(null)->change();
            $table->string('gender')->nullable()->default(null)->change();
            $table->unsignedBigInteger('internship_id')->nullable()->change();
            
        });
    }

    /**
     * Reverse the Migration.
     */
    public function down(): void
    {
        Schema::table('userdetails', function (Blueprint $table) {
            //
        });
    }
};
