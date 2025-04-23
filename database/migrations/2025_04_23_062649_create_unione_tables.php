<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('username', 100);
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->enum('role', ['customers', 'admin', 'trainers', 'recruiters']);
            $table->text('experience');
            $table->string('photo', 255);
        });

        Schema::create('community', function (Blueprint $table) {
            $table->id('community_id');
            $table->unsignedBigInteger('id_user')->nullable();
            $table->string('title', 100)->nullable();
            $table->text('description')->nullable();
            $table->string('status', 50)->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->string('community_photo', 255)->nullable();

            $table->foreign('id_user')->references('id_user')->on('users');
        });

        Schema::create('connections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->unsignedBigInteger('connection_id')->nullable();
            $table->string('status', 50)->nullable();
            $table->dateTime('created_at')->nullable();

            $table->foreign('id_user')->references('id_user')->on('users');
            $table->foreign('connection_id')->references('id_user')->on('users');
        });

        Schema::create('course', function (Blueprint $table) {
            $table->id('course_id');
            $table->unsignedBigInteger('id_user')->nullable();
            $table->string('title', 100)->nullable();
            $table->string('category', 50)->nullable();
            $table->text('description')->nullable();
            $table->string('status', 50)->nullable();
            $table->string('photo', 255)->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();

            $table->foreign('id_user')->references('id_user')->on('users');
        });

        Schema::create('jobs', function (Blueprint $table) {
            $table->id('job_id');
            $table->unsignedBigInteger('id_user')->nullable();
            $table->string('job_title', 100)->nullable();
            $table->string('location', 100)->nullable();
            $table->dateTime('job_create')->nullable();
            $table->string('job_type', 50)->nullable();
            $table->string('photo', 255)->nullable();

            $table->foreign('id_user')->references('id_user')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('course');
        Schema::dropIfExists('connections');
        Schema::dropIfExists('community');
        Schema::dropIfExists('users');
    }
};
