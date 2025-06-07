<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;    
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CourseDetailController;
use App\Http\Controllers\ProfileController;

// Public routes
Route::get('/', function () {
    return view('home.welcome');
})->name('welcome');

// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.adminview');
    })->name('admin.adminview');
});
// Guest routes
Route::middleware('guest')->group(function () {
    // Login routes
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login');

    // Register routes
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');
});

// Protected routes
Route::middleware(['auth'])->group(function () {
    // Home route after login - updated to use homeindex view
    Route::get('/home', function () {
        return view('home.homeindex');
    })->name('home');

    // Profile routes
    Route::prefix('profile')->name('profile.')->group(function () {
        // Main profile routes
        Route::get('/', [ProfileController::class, 'show'])->name('show');
        Route::put('/update', [ProfileController::class, 'update'])->name('update');

        // Photo routes
        Route::post('/update-cover', [ProfileController::class, 'updateCover'])->name('update-cover');
        Route::post('/update-avatar', [ProfileController::class, 'updateAvatar'])->name('update-avatar');

        // Experience routes
        Route::get('/experience/create', [ProfileController::class, 'createExperience'])->name('experience.create');
        Route::post('/experience', [ProfileController::class, 'storeExperience'])->name('experience.store');
        Route::get('/experience/{id}/edit', [ProfileController::class, 'editExperience'])->name('experience.edit');
        Route::put('/experience/{id}', [ProfileController::class, 'updateExperience'])->name('experience.update');
        Route::delete('/experience/{id}', [ProfileController::class, 'deleteExperience'])->name('experience.delete');

        // Education routes
        Route::get('/education/create', [ProfileController::class, 'createEducation'])->name('education.create');
        Route::post('/education', [ProfileController::class, 'storeEducation'])->name('education.store');
        Route::get('/education/{id}/edit', [ProfileController::class, 'editEducation'])->name('education.edit');
        Route::put('/education/{id}', [ProfileController::class, 'updateEducation'])->name('education.update');
        Route::delete('/education/{id}', [ProfileController::class, 'deleteEducation'])->name('education.delete');

        // Skill routes
        Route::get('/skill/create', [ProfileController::class, 'createSkill'])->name('skill.create');
        Route::post('/skill', [ProfileController::class, 'storeSkill'])->name('skill.store');
        Route::get('/skill/{id}/edit', [ProfileController::class, 'editSkill'])->name('skill.edit');
        Route::put('/skill/{id}', [ProfileController::class, 'updateSkill'])->name('skill.update');
        Route::delete('/skill/{id}', [ProfileController::class, 'deleteSkill'])->name('skill.delete');

        // Project routes
        Route::get('/project/create', [ProfileController::class, 'createProject'])->name('project.create');
        Route::post('/project', [ProfileController::class, 'storeProject'])->name('project.store');
        Route::delete('/project/{id}', [ProfileController::class, 'deleteProject'])->name('project.delete');

        // Certification routes
        Route::get('/certification/create', [ProfileController::class, 'createCertification'])->name('certification.create');
        Route::post('/certification', [ProfileController::class, 'storeCertification'])->name('certification.store');
        Route::get('/certification/{id}/edit', [ProfileController::class, 'editCertification'])->name('certification.edit');
        Route::put('/certification/{id}', [ProfileController::class, 'updateCertification'])->name('certification.update');
        Route::delete('/certification/{id}', [ProfileController::class, 'deleteCertification'])->name('certification.delete');

        // About section routes
        Route::put('/update-about', [ProfileController::class, 'updateAbout'])->name('update-about');
    });
    
    // Course routes with explicit course_id parameter
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/courses/{course_id}', [CourseController::class, 'show'])->name('courses.show');
    Route::get('/courses/{course_id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::put('/courses/{course_id}', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('/courses/{course_id}', [CourseController::class, 'destroy'])->name('courses.destroy');

    Route::post('/course-details', [CourseDetailController::class, 'store'])->name('course-details.store');
    Route::put('/course-details/{id}', [CourseDetailController::class, 'update'])->name('course-details.update');
    Route::delete('/course-details/{id}', [CourseDetailController::class, 'destroy'])->name('course-details.destroy');
    
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
