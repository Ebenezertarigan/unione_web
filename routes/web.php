<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;    
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CourseDetailController;

// Public routes
Route::get('/', function () {
    return view('home.welcome');
})->name('welcome');

// Guest routes
Route::middleware('guest')->group(function () {
    // Login routes
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

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

    Route::get('/profile', function () {
        return view('profile.index');
    })->name('profile');

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
