<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostPolicyController;
use App\Http\Controllers\FormController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('subscribe',function(){
//     return view('subscriber');
// });
// https://blog.w3programmers.com/authorization-with-laravel-gates/
Route::get('subscribe',function() {
    if (Gate::allows('subscriber-only', Auth::user())) {
        return view('subscriber');
    }
    return redirect()->route('login');
});

// for vuejs
// Route::get('/appVue', function () {
//     return view('appVue');
// })
// ->name('application');

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/posts', [PostController::class, 'index'])->name('posts.show');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
// Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.delete');
Route::get('/posts/{id}', [PostController::class, 'destroy'])->name('destroy');

Route::get('/calendar', [App\Http\Controllers\HomeController::class, 'CalendarFn'])->name('calendar');

Route::get('/form/create', [FormController::class, 'create'])->name('form.create');
Route::post('/form/form_store_data', [FormController::class, 'store'])->name('store_data');
Route::get('/form/show', [FormController::class, 'show'])->name('form.show');
Route::get('/form/edit/{id}', [FormController::class, 'edit']);
Route::post('/update_data/{id}', [FormController::class, 'update']);
Route::get('/form/delete/{id}', [FormController::class, 'destroy']);



// Laravel Policy
// https://blog.w3programmers.com/user-role-and-permission-with-laravel-policy/
//Show all postsPolicy
Route::get('/postsPolicy', [PostPolicyController::class, 'index'])->name('postsPolicy.list');

// Route to display the create post form

Route::get('/postsPolicy/create', [PostPolicyController::class, 'create'])->name('postsPolicy.create');

// View a post
Route::get('/postsPolicy/{post}', [PostPolicyController::class, 'view'])->name('postsPolicy.view');

Route::post('/postsPolicy',  [PostPolicyController::class, 'store'])->name('postsPolicy.store');

// Edit an existing post
Route::get('/postsPolicy/{post}/edit', [PostPolicyController::class, 'edit'])->name('postsPolicy.edit');
Route::put('/postsPolicy/{post}', [PostPolicyController::class, 'update'])->name('postsPolicy.update');

// Delete a post
Route::get('/postsPolicy/{post}/delete',  [PostPolicyController::class, 'delete'])->name('postsPolicy.delete');
Route::delete('/postsPolicy/{post}',  [PostPolicyController::class, 'destroy'])->name('postsPolicy.destroy');