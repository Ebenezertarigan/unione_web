<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // customer_profiles (diubah menjadi profiles untuk lebih general)
        Schema::create('customer_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique(); // One-to-one dengan users
            $table->string('headline')->nullable();
            $table->text('about')->nullable();
            $table->string('phone_number')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('location')->nullable();
            $table->string('avatar')->nullable(); // Profile picture
            $table->string('cover_photo')->nullable(); // Cover photo
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });

        // educations
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_id'); // Ganti customer_id menjadi profile_id
            $table->string('school_name');
            $table->string('degree')->nullable();
            $table->string('major')->nullable();
            $table->year('start_year')->nullable();
            $table->year('end_year')->nullable();
            $table->timestamps();

            $table->foreign('profile_id')->references('id')->on('customer_profiles')->onDelete('cascade');
        });

        // experiences
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_id'); // Ganti customer_id menjadi profile_id
            $table->string('company_name'); // Dari 'name' menjadi lebih spesifik
            $table->string('position');
            $table->text('description')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('employment_type')->nullable(); // Ganti 'category' menjadi lebih spesifik
            $table->timestamps();

            $table->foreign('profile_id')->references('id')->on('customer_profiles')->onDelete('cascade');
        });

        // certifications
        Schema::create('certifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_id'); // Ganti customer_id menjadi profile_id
            $table->string('name');
            $table->string('issuing_organization'); // Ganti 'organization' menjadi lebih spesifik
            $table->date('issued_date')->nullable();
            $table->date('expiration_date')->nullable();
            $table->string('credential_url')->nullable();
            $table->string('credential_id')->nullable(); // Tambahan field
            $table->timestamps();

            $table->foreign('profile_id')->references('id')->on('customer_profiles')->onDelete('cascade');
        });

        // projects
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_id'); // Ganti customer_id menjadi profile_id
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('project_url')->nullable(); // Ganti 'project_link' menjadi 'project_url'
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->boolean('is_current')->default(false); // Tambahan field
            $table->timestamps();

            $table->foreign('profile_id')->references('id')->on('customer_profiles')->onDelete('cascade');
        });

        // skills
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_id'); // Ganti customer_id menjadi profile_id
            $table->string('name'); // Ganti 'skill_name' menjadi 'name'
            $table->string('proficiency_level')->nullable(); // Ganti 'level' menjadi lebih deskriptif
            $table->integer('years_of_experience')->nullable(); // Tambahan field
            $table->timestamps();

            $table->foreign('profile_id')->references('id')->on('customer_profiles')->onDelete('cascade');
        });

        // employers (versi optimal)
        Schema::create('employers', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->primary(); // PK sekaligus FK
            $table->string('company_name');
            $table->string('company_logo')->nullable();
            $table->text('description')->nullable();
            $table->string('industry')->nullable();
            $table->string('website')->nullable();
            $table->string('phone_number')->nullable();
            $table->year('founded_year')->nullable();
            $table->string('company_size')->nullable(); // Tambahan field
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employers');
        Schema::dropIfExists('skills');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('certifications');
        Schema::dropIfExists('experiences');
        Schema::dropIfExists('educations');
        Schema::dropIfExists('customer_profiles'); // Changed from 'profiles' to 'customer_profiles'
    }
};
