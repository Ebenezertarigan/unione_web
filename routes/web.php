<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;    
use App\Http\Controllers\courseController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/courses', [courseController::class, 'index'])->name('courses.index');
Route::get('/courses/create', [courseController::class, 'create'])->name('courses.create');
Route::post('/courses', [courseController::class, 'store'])->name('courses.store');
Route::get('/courses/{id}/edit', [courseController::class, 'edit'])->name('courses.edit');
Route::delete('/courses/{id}', [courseController::class, 'destroy'])->name('courses.destroy');
Route::put('/courses/{id}', [CourseController::class, 'update'])->name('courses.update');
Route::get('/courses/show/{id}', [CourseController::class, 'show'])->name('courses.show');


