<?php

// use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;   

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Todotask
|--------------------------------------------------------------------------

*/

Route::get('/', [TasksController::class, 'index'])->name('tasks.index');
//詳細ページ
Route::get('/{id}', [TasksController::class, 'show'])->name('tasks.show');
// タスク追加
Route::get('/tasks/add', [TasksController::class, 'add'])->name('tasks.add');
// 追加したタスクをデータベースに追加
Route::post('/tasks/add', [TasksController::class, 'store'])->name('tasks.store');
//タスクの編集
Route::get('/tasks/edit/{id}', [TasksController::class, 'edit'])->name('tasks.edit');

Route::post('/tasks/edit/{id}', [TasksController::class, 'update'])->name('tasks.update');

Route::post('tasks/delete/{id}', [TasksController::class, 'delete'])->name('tasks.delete');