<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EditTeamController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChangePasswordController;



Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'App\Http\Controllers\HomeController@home');
	Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

	Route::get('/tasks', 'App\Http\Controllers\TaskController@tasks')->name('tasks');
	Route::get('/new-task', 'App\Http\Controllers\TaskController@create')->name('new-task');
	Route::post('/new-task', 'App\Http\Controllers\TaskController@store')->name('task.store');
	Route::delete('/new-task/{id}', 'App\Http\Controllers\TaskController@destroy')->name('suppression_task');

	Route::get('profile', [ProfileController::class, 'show'])->name('profile');
	Route::get('/user-profile', [ProfileController::class, 'create'])->name('user-profile');
	Route::post('/user-profile', [InfoUserController::class, 'store']);

	Route::get('/user-management', [TeamController::class, 'tables'])->name('user-management');
	Route::delete('/user-management/{id}', 'App\Http\Controllers\TeamController@destroy')->name('suppression');
	Route::get('/new-team', 'App\Http\Controllers\TeamController@create')->name('new-team');
	Route::post('/user-management', 'App\Http\Controllers\TeamController@store')->name('teams.store');

	Route::get('/tables', 'App\Http\Controllers\ProjectController@projects')->name('project_creation');
	Route::get('/new-project', 'App\Http\Controllers\ProjectController@create')->name('new-project');
	Route::post('/new-project', 'App\Http\Controllers\ProjectController@store')->name('project.store');
	Route::delete('/tables/{id}', 'App\Http\Controllers\ProjectController@destroy')->name('suppression_project');

	Route::get('/edit-team/{id}', 'App\Http\Controllers\EditTeamController@create')->name('edit-team-form');
	Route::post('/edit-team', 'App\Http\Controllers\EditTeamController@update')->name('update-team');

	Route::get('/members', 'App\Http\Controllers\MemberController@tables')->name('members');
	Route::delete('/members/{id}', 'App\Http\Controllers\MemberController@destroy')->name('suppression');

	Route::get('/search', 'App\Http\Controllers\SearchController@search')->name('search');

    Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

    Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');

    Route::get('/logout', [SessionsController::class, 'destroy']);
	//Route::get('/user-profile', [InfoUserController::class, 'create'])->name('user-profile');
	
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');