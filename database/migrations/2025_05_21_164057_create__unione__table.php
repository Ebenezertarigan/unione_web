<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['admin', 'user', 'employers'])->default('user');
            $table->timestamps();
        });



        // courses - added user_id and thumbnail
        Schema::create('courses', function (Blueprint $table) {
            $table->id('course_id');
            $table->string('title');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->text('description');
            $table->string('video')->nullable();
            $table->string('thumbnail')->nullable(); // Added thumbnail field
            $table->string('category')->nullable();
            $table->unsignedBigInteger('user_id'); // Added user_id for instructor
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });

        // course_details - added unique constraint
        Schema::create('course_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('course_id');
            $table->boolean('is_enrolled')->default(false);
            $table->boolean('is_completed')->default(false);
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('course_id')->references('course_id')->on('courses')->onDelete('cascade');
            $table->unique(['user_id', 'course_id']); // Prevent duplicate enrollments
        });

        // jobs
        Schema::create('jobs', function (Blueprint $table) {
            $table->id('job_id');
            $table->string('title');
            $table->text('description');
            $table->string('location');
            $table->timestamps();
        });

        // jobs_applications
        Schema::create('jobs_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('job_id');
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
            $table->date('open_date');
            $table->date('close_date');
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('job_id')->references('job_id')->on('jobs')->onDelete('cascade');
        });

        // community
        Schema::create('community', function (Blueprint $table) {
            $table->id('community_id');
            $table->string('name');
            $table->string('description');
            $table->string('thumbnail')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->timestamps();

            $table->foreign('created_by')->references('user_id')->on('users')->onDelete('cascade');
        });

        // community_users
        Schema::create('community_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('community_id');
            $table->timestamp('joined_at')->useCurrent();

            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('community_id')->references('community_id')->on('community')->onDelete('cascade');
        });

        // community_posts
        Schema::create('community_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('community_id');
            $table->string('title');
            $table->text('content');
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('community_id')->references('community_id')->on('community')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('experiences');
        Schema::dropIfExists('community_posts');
        Schema::dropIfExists('community_users');
        Schema::dropIfExists('community');
        Schema::dropIfExists('jobs_applications');
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('course_details');
        Schema::dropIfExists('courses');
        Schema::dropIfExists('users');
    }
};
