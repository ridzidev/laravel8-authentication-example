<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

use App\Http\Controllers\CourseController;

use App\Http\Controllers\CarouselController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/courses/carousel', [CarouselController::class, 'getCarouselData']);

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::get('/images/{filename}', function ($filename) {
        $path = resource_path('img/' . $filename);
        
        if (file_exists($path)) {
            return response()->file($path);
        } else {
            return response('Image not found', 404);
        }
    });

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

        
        /**
         * Profile Update Route
         */
        Route::post('/update-profile', 'ProfileController@update')->name('update_profile');

        Route::get('/profile', 'ProfileController@show')->name('profile.show');
        Route::post('/profile', 'ProfileController@update')->name('profile.update');

        Route::get('/profile/edit', 'ProfileController@show')->name('profile.edit');


            /**
         * User Management Routes
         */
        Route::get('/add-user', 'UserController@addUser')->name('addUser');
        Route::post('/add-user', 'UserController@storeUser')->name('storeUser');

        Route::get('/edit-user/{id}', [UserController::class, 'editUser'])->name('editUser');
        Route::post('/update-user/{id}', [UserController::class, 'updateUser'])->name('updateUser');        
        Route::get('/get-edit-user-modal/{id}', 'UserController@getEditUserModal');
        
        Route::get('/get-delete-user-modal/{id}', [UserController::class, 'getDeleteUserModal']);
        Route::delete('/delete-user/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');




// routes/web.php


        Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
        Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
        Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');

                
        // Modify the existing route for the edit action
        Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');

        // Add the route for updating the course
        Route::post('/courses/{id}/update', [CourseController::class, 'update'])->name('courses.update');


        Route::delete('/delete-course/{id}', [CourseController::class, 'deleteCourse'])->name('delete-course');
        
        Route::delete('/courses/{id}', 'CourseController@destroy')->name('courses.destroy');

        Route::get('/get-delete-course-modal/{id}', [CourseController::class, 'getDeleteCourseModal']);
        
        // Route::get('/courses/carousel', [CourseController::class, 'getCourses']);

        
    });


});
