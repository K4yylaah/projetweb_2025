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
        Schema::create('users_schools', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('school_id');
            $table->enum('role', ['admin', 'teacher', 'student'])->default('student');
            $table->timestamps();
        });

        Schema::table('users_schools', function (Blueprint $table) {
            $table->unsignedBigInteger('cohort_id')->nullable()->after('school_id');
            $table->foreign('cohort_id')->references('id')->on('cohorts')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_schools');
    }
};