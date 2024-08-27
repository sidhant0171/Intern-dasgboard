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
        Schema::table('tasks', function (Blueprint $table) {
            // $table->dropForeign(['role_id']);
            // $table->dropColumn('role_id');
            $table->dropForeign(['internship_id']);

            
            

             $table->dropColumn('internship_id');

        //      $table->unsignedBigInteger('users_id')->nullable();
        //      $table->foreign('users_id')->references('id')->on('users');

        //    $table->integer('status')->default(false)->change();
        //    $table->boolean('is_delete')->default(false)->change();


        //    $table->unsignedBigInteger('users_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('task', function (Blueprint $table) {
            //
        });
    }
};
